<?php
// Database configuration for donations
class DonationDatabase {
    private $dbPath;
    
    public function __construct($dbPath = 'donations.db') {
        $this->dbPath = $dbPath;
        $this->initDatabase();
    }
    
    private function initDatabase() {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create donations table
            $sql = "CREATE TABLE IF NOT EXISTS donations (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                donor_name TEXT NOT NULL,
                donor_email TEXT NOT NULL,
                amount DECIMAL(10,2) NOT NULL,
                payment_method TEXT NOT NULL,
                transaction_id TEXT,
                status TEXT DEFAULT 'pending',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
            
            $pdo->exec($sql);
            
            // Create IPN log table
            $sql = "CREATE TABLE IF NOT EXISTS ipn_logs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                transaction_id TEXT,
                payment_status TEXT,
                amount DECIMAL(10,2),
                payer_email TEXT,
                raw_data TEXT,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
            
            $pdo->exec($sql);
            
        } catch (PDOException $e) {
            error_log("Database initialization error: " . $e->getMessage());
        }
    }
    
    public function insertDonation($donorName, $donorEmail, $amount, $paymentMethod, $transactionId = null) {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO donations (donor_name, donor_email, amount, payment_method, transaction_id) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$donorName, $donorEmail, $amount, $paymentMethod, $transactionId]);
            
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log("Database insert error: " . $e->getMessage());
            return false;
        }
    }
    
    public function updateDonationStatus($transactionId, $status) {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "UPDATE donations SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE transaction_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$status, $transactionId]);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log("Database update error: " . $e->getMessage());
            return false;
        }
    }
    
    public function getAllDonations($limit = 50, $offset = 0) {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM donations ORDER BY created_at DESC LIMIT ? OFFSET ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$limit, $offset]);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database select error: " . $e->getMessage());
            return [];
        }
    }
    
    public function getDonationStats() {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT 
                        COUNT(*) as total_donations,
                        SUM(amount) as total_amount,
                        AVG(amount) as avg_amount,
                        COUNT(CASE WHEN status = 'completed' THEN 1 END) as completed_donations,
                        COUNT(CASE WHEN status = 'pending' THEN 1 END) as pending_donations
                    FROM donations";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database stats error: " . $e->getMessage());
            return [
                'total_donations' => 0,
                'total_amount' => 0,
                'avg_amount' => 0,
                'completed_donations' => 0,
                'pending_donations' => 0
            ];
        }
    }
    
    public function insertIpnLog($transactionId, $paymentStatus, $amount, $payerEmail, $rawData) {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO ipn_logs (transaction_id, payment_status, amount, payer_email, raw_data) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$transactionId, $paymentStatus, $amount, $payerEmail, $rawData]);
            
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log("IPN log insert error: " . $e->getMessage());
            return false;
        }
    }
    
    public function getIpnLogs($limit = 50, $offset = 0) {
        try {
            $pdo = new PDO('sqlite:' . $this->dbPath);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM ipn_logs ORDER BY created_at DESC LIMIT ? OFFSET ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$limit, $offset]);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("IPN logs select error: " . $e->getMessage());
            return [];
        }
    }
}
?>
