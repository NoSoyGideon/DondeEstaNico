<?php
/**
 * Sistema de Logging Mejorado para AdoptBuddies
 * Centraliza todo el logging del sistema con rotación automática
 */

class Logger {
    private $logDir;
    private $maxFileSize = 10 * 1024 * 1024; // 10MB
    private $maxFiles = 30; // Mantener 30 archivos de log
    
    public function __construct($logDir = 'logs') {
        $this->logDir = $logDir;
        $this->ensureLogDir();
    }
    
    private function ensureLogDir() {
        if (!is_dir($this->logDir)) {
            mkdir($this->logDir, 0755, true);
        }
    }
    
    /**
     * Log general del sistema
     */
    public function info($message, $context = []) {
        $this->log('INFO', $message, $context, 'system.log');
    }
    
    /**
     * Log de operaciones exitosas
     */
    public function success($message, $context = []) {
        $this->log('SUCCESS', $message, $context, 'success.log');
    }
    
    /**
     * Log de advertencias
     */
    public function warning($message, $context = []) {
        $this->log('WARNING', $message, $context, 'warnings.log');
    }
    
    /**
     * Log de errores
     */
    public function error($message, $context = []) {
        $this->log('ERROR', $message, $context, 'errors.log');
    }
    
    /**
     * Log de depuración
     */
    public function debug($message, $context = []) {
        $this->log('DEBUG', $message, $context, 'debug.log');
    }
    
    /**
     * Log específico para donaciones
     */
    public function donation($message, $context = []) {
        $this->log('DONATION', $message, $context, 'donations.log');
    }
    
    /**
     * Log específico para PayPal IPN
     */
    public function paypal($message, $context = []) {
        $this->log('PAYPAL', $message, $context, 'paypal_ipn.log');
    }
    
    /**
     * Log específico para retornos exitosos de PayPal
     */
    public function paypalSuccess($message, $context = []) {
        $this->log('PAYPAL_SUCCESS', $message, $context, 'paypal_success.log');
    }
    
    /**
     * Método principal de logging
     */
    private function log($level, $message, $context, $filename) {
        $timestamp = date('Y-m-d H:i:s');
        $caller = $this->getCaller();
        
        // Formatear el mensaje
        $formattedMessage = sprintf(
            "[%s] [%s] [%s] - %s",
            $timestamp,
            $level,
            $caller,
            $message
        );
        
        // Agregar contexto si existe
        if (!empty($context)) {
            $formattedMessage .= " | Context: " . json_encode($context);
        }
        
        $formattedMessage .= "\n";
        
        $logFile = $this->logDir . '/' . $filename;
        
        // Rotar archivo si es necesario
        $this->rotateLogFile($logFile);
        
        // Escribir log
        file_put_contents($logFile, $formattedMessage, FILE_APPEND | LOCK_EX);
        
        // También escribir en el log principal
        if ($filename !== 'system.log') {
            file_put_contents($this->logDir . '/system.log', $formattedMessage, FILE_APPEND | LOCK_EX);
        }
    }
    
    /**
     * Obtener información del archivo y línea que llamó el log
     */
    private function getCaller() {
        $backtrace = debug_backtrace();
        
        // Buscar el primer archivo que no sea este logger
        foreach ($backtrace as $trace) {
            if (isset($trace['file']) && basename($trace['file']) !== 'logger.php') {
                return basename($trace['file']) . ':' . ($trace['line'] ?? 'unknown');
            }
        }
        
        return 'unknown:unknown';
    }
    
    /**
     * Rotar archivo de log si supera el tamaño máximo
     */
    private function rotateLogFile($logFile) {
        if (!file_exists($logFile)) {
            return;
        }
        
        if (filesize($logFile) >= $this->maxFileSize) {
            $timestamp = date('Y-m-d_H-i-s');
            $rotatedFile = $logFile . '.' . $timestamp;
            
            // Mover archivo actual
            rename($logFile, $rotatedFile);
            
            // Comprimir archivo rotado
            if (function_exists('gzopen')) {
                $this->compressLogFile($rotatedFile);
            }
            
            // Limpiar archivos antiguos
            $this->cleanOldLogFiles(dirname($logFile), basename($logFile));
        }
    }
    
    /**
     * Comprimir archivo de log
     */
    private function compressLogFile($file) {
        $gz = gzopen($file . '.gz', 'wb9');
        $fp = fopen($file, 'rb');
        
        while (!feof($fp)) {
            gzwrite($gz, fread($fp, 8192));
        }
        
        fclose($fp);
        gzclose($gz);
        
        // Eliminar archivo original
        unlink($file);
    }
    
    /**
     * Limpiar archivos de log antiguos
     */
    private function cleanOldLogFiles($dir, $baseFilename) {
        $pattern = $dir . '/' . $baseFilename . '.*';
        $files = glob($pattern);
        
        if (count($files) > $this->maxFiles) {
            // Ordenar por fecha de modificación
            usort($files, function($a, $b) {
                return filemtime($a) - filemtime($b);
            });
            
            // Eliminar archivos más antiguos
            $filesToDelete = array_slice($files, 0, count($files) - $this->maxFiles);
            foreach ($filesToDelete as $file) {
                unlink($file);
            }
        }
    }
    
    /**
     * Obtener resumen de logs
     */
    public function getLogSummary() {
        $summary = [];
        $logFiles = glob($this->logDir . '/*.log');
        
        foreach ($logFiles as $file) {
            $filename = basename($file);
            $summary[$filename] = [
                'size' => filesize($file),
                'size_human' => $this->formatBytes(filesize($file)),
                'modified' => date('Y-m-d H:i:s', filemtime($file)),
                'lines' => $this->countLines($file)
            ];
        }
        
        return $summary;
    }
    
    /**
     * Leer últimas líneas de un log
     */
    public function getRecentLogs($filename, $lines = 50) {
        $file = $this->logDir . '/' . $filename;
        
        if (!file_exists($file)) {
            return [];
        }
        
        $output = [];
        $fp = fopen($file, 'r');
        
        // Ir al final del archivo
        fseek($fp, -1, SEEK_END);
        
        $pos = ftell($fp);
        $line = '';
        $lineCount = 0;
        
        // Leer hacia atrás
        while ($pos >= 0 && $lineCount < $lines) {
            fseek($fp, $pos, SEEK_SET);
            $char = fgetc($fp);
            
            if ($char === "\n" || $pos === 0) {
                if ($line !== '') {
                    array_unshift($output, $line);
                    $lineCount++;
                }
                $line = '';
            } else {
                $line = $char . $line;
            }
            
            $pos--;
        }
        
        fclose($fp);
        return $output;
    }
    
    /**
     * Formatear bytes a formato legible
     */
    private function formatBytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, $precision) . ' ' . $units[$i];
    }
    
    /**
     * Contar líneas en un archivo
     */
    private function countLines($file) {
        $count = 0;
        $fp = fopen($file, 'r');
        
        while (!feof($fp)) {
            if (fgets($fp) !== false) {
                $count++;
            }
        }
        
        fclose($fp);
        return $count;
    }
    
    /**
     * Limpiar todos los logs
     */
    public function clearAllLogs() {
        $logFiles = glob($this->logDir . '/*.log');
        $cleared = 0;
        
        foreach ($logFiles as $file) {
            if (file_put_contents($file, '') !== false) {
                $cleared++;
            }
        }
        
        return $cleared;
    }
    
    /**
     * Crear instancia singleton
     */
    public static function getInstance() {
        static $instance = null;
        
        if ($instance === null) {
            $instance = new self();
        }
        
        return $instance;
    }
}

// Función helper global para logging rápido
function log_info($message, $context = []) {
    Logger::getInstance()->info($message, $context);
}

function log_success($message, $context = []) {
    Logger::getInstance()->success($message, $context);
}

function log_warning($message, $context = []) {
    Logger::getInstance()->warning($message, $context);
}

function log_error($message, $context = []) {
    Logger::getInstance()->error($message, $context);
}

function log_debug($message, $context = []) {
    Logger::getInstance()->debug($message, $context);
}

function log_donation($message, $context = []) {
    Logger::getInstance()->donation($message, $context);
}

function log_paypal($message, $context = []) {
    Logger::getInstance()->paypal($message, $context);
}

function log_paypal_success($message, $context = []) {
    Logger::getInstance()->paypalSuccess($message, $context);
}
?>
