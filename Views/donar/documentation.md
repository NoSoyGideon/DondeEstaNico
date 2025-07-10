# 📋 Sistema de Donaciones AdoptBuddies - Documentación

## 🎯 Descripción del Sistema

Este sistema permite a los usuarios realizar donaciones a través de PayPal para el refugio de animales AdoptBuddies. Incluye una interfaz web amigable, procesamiento seguro de pagos y un panel de administración para gestionar las donaciones.

## 📁 Estructura del Proyecto

```
Donaciones_uribe/
├── 📄 index.php              # Página principal de donaciones
├── 📄 process_donation.php   # Procesamiento de donaciones
├── 📄 donation-success.php   # Página de éxito
├── 📄 donation-cancel.php    # Página de cancelación
├── 📄 admin.php              # Panel de administración
├── 📄 api.php                # API para el panel admin
├── 📄 config.php             # Configuración del sistema
├── 📄 database.php           # Manejo de base de datos
├── 📄 logger.php             # Sistema de logging avanzado
├── 📄 paypal-ipn.php         # Verificación de pagos PayPal
├── 📄 logs_viewer.php        # Visor de logs del sistema
├── 📄 debug.php              # Información de depuración
├── 📄 test_system.php        # Pruebas del sistema
├── 📂 css/
│   └── custom.css            # Estilos personalizados
├── 📂 js/
│   └── donations.js          # Funcionalidad JavaScript
├── 📂 .vscode/
│   └── tasks.json            # Tareas de VS Code
├── 📂 logs/                  # 🆕 Carpeta de logs organizados
│   ├── system.log            # Log principal del sistema
│   ├── donations.log         # Logs específicos de donaciones
│   ├── paypal_ipn.log        # Logs de PayPal IPN
│   ├── paypal_success.log    # Logs de retornos exitosos
│   ├── errors.log            # Logs de errores
│   ├── warnings.log          # Logs de advertencias
│   ├── success.log           # Logs de operaciones exitosas
│   └── debug.log             # Logs de depuración
└── 📄 donations.db           # Base de datos SQLite
```


## 💰 Cómo Funciona el Sistema

### 1. Flujo de Donación
```
Usuario → Página Principal → Selecciona Monto → Llena Formulario → 
PayPal → Procesa Pago → Regresa al Sitio → Página de Éxito
```

### 2. Procesamiento Técnico

#### A. Página Principal (`index.php`)
- Muestra opciones de donación ($25, $50, $100, personalizado)
- Formulario para datos del donante
- Validación JavaScript
- Envío a `process_donation.php`

#### B. Procesamiento (`process_donation.php`)
1. Recibe datos del formulario
2. Valida información
3. Genera ID de transacción único
4. Guarda donación en base de datos (estado: 'pending')
5. Crea formulario oculto para PayPal
6. Redirige automáticamente a PayPal

#### C. PayPal Sandbox
- Usuario completa el pago
- PayPal procesa la transacción
- Envía notificación IPN al servidor
- Redirige usuario de vuelta al sitio

#### D. Verificación IPN (`paypal-ipn.php`)
1. Recibe notificación de PayPal
2. Verifica autenticidad del pago
3. Actualiza estado de la donación
4. Registra logs detallados

#### E. Página de Éxito (`donation-success.php`)
- Muestra confirmación al usuario
- Recupera datos de la donación
- Envía email de confirmación
- Muestra detalles de la transacción

## 🔧 Panel de Administración

### Funcionalidades:
- **📊 Estadísticas**: Total recaudado, número de donaciones
- **📋 Lista de Donaciones**: Tabla con todas las donaciones
- **🔍 Filtros**: Por fecha, estado, monto
- **📄 Detalles**: Información completa de cada donación
- **📜 Logs**: Registros de actividad del sistema

### Estados de Donación:
- **🟡 Pending**: Iniciada pero no confirmada
- **🟢 Completed**: Pago verificado y completado
- **🔴 Failed**: Pago fallido
- **🟠 Cancelled**: Cancelada por el usuario

## 🧪 Pruebas del Sistema

### 1. Configuración de Pruebas
- Asegúrate de que `mode` esté en `'sandbox'`
- Usa cuentas de sandbox de PayPal
- Accede a `http://localhost:3000/index.php`

### 2. Datos de Prueba PayPal

#### Tarjetas de Crédito:
- **Visa**: `4111 1111 1111 1111`
- **Mastercard**: `5555 5555 5555 4444`
- **CVV**: `123`
- **Fecha**: `12/2030`

#### Cuentas Sandbox:
- Usa las cuentas que creaste en PayPal Developer
- Email: `adoptbuddies-personal@test.com`
- Password: `qwf2&P.2`

### 3. Proceso de Prueba
1. Selecciona monto de donación
2. Llena formulario:
   - Nombre: Juan Pérez
   - Email: test@ejemplo.com
   - Mensaje: Prueba de donación
3. Haz clic en "Donar con PayPal"
4. Completa el pago en PayPal Sandbox
5. Verifica que regrese a página de éxito
6. Revisa el panel de administración

## 🔍 Solución de Problemas

### Problemas Comunes:

#### 1. "Página no disponible" al regresar de PayPal
**Causa**: URL de retorno incorrecta
**Solución**: Verifica `return_url` en `config.php`

#### 2. Donaciones se quedan en "Pending"
**Causa**: IPN no se está procesando
**Solución**: 
- Verifica que `paypal-ipn.php` sea accesible
- Revisa logs en `donations.log`
- Confirma que el email business sea correcto

#### 3. Error 500 en páginas PHP
**Causa**: Error de sintaxis o archivo faltante
**Solución**:
- Revisa logs de error de PHP
- Verifica que todos los archivos existan
- Confirma permisos de escritura

#### 4. Formulario no envía datos
**Causa**: JavaScript deshabilitado o error
**Solución**:
- Abre consola del navegador (F12)
- Verifica errores JavaScript
- Confirma que `donations.js` se carga

### Archivos de Log:
- **logs/system.log**: Log principal con toda la actividad
- **logs/donations.log**: Actividad específica de donaciones
- **logs/paypal_ipn.log**: Comunicaciones con PayPal
- **logs/paypal_success.log**: Retornos exitosos de PayPal
- **logs/errors.log**: Errores del sistema
- **logs/warnings.log**: Advertencias del sistema
- **logs/success.log**: Operaciones exitosas
- **logs/debug.log**: Información de depuración

### 🔧 Herramientas de Diagnóstico:
- **Visor de Logs**: `http://localhost:3000/logs_viewer.php`
- **Debug Info**: `http://localhost:3000/debug.php`
- **Test del Sistema**: `http://localhost:3000/test_system.php`

## 📧 Configuración de Email

### Configurar SMTP (Opcional):
```php
// En config.php
'email' => [
    'method' => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => 'tu-email@gmail.com',
    'smtp_pass' => 'tu-contraseña',
    'from' => 'noreply@adoptbuddies.com',
    'from_name' => 'AdoptBuddies',
]
```

## 🚀 Puesta en Producción

### 1. Cambios Necesarios:
1. Cambiar `mode` a `'live'` en `config.php`
2. Usar email real de PayPal Business
3. Actualizar URLs a tu dominio real
4. Configurar SSL/HTTPS
5. Establecer permisos de archivo apropiados

### 2. Configuración de Servidor:
```apache
# .htaccess para Apache
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 3. Seguridad:
- Mantener logs fuera del directorio web
- Configurar permisos restrictivos
- Usar HTTPS para todas las comunicaciones
- Validar y sanitizar todas las entradas

## 📊 Mantenimiento

### Tareas Regulares:
1. **Revisar logs**: Buscar errores o actividad sospechosa
2. **Limpiar logs**: Archivar logs antiguos
3. **Verificar donaciones**: Confirmar que se procesan correctamente
4. **Actualizar sistema**: Mantener PHP y dependencias actualizadas

### Respaldo:
```bash
# Respaldar base de datos
cp donations.db backups/donations_$(date +%Y%m%d).db

# Respaldar logs
tar -czf backups/logs_$(date +%Y%m%d).tar.gz logs/
```

## 🔗 Enlaces Útiles

- [PayPal Developer](https://developer.paypal.com/)
- [PayPal IPN Guide](https://developer.paypal.com/docs/api-basics/notifications/ipn/)
- [PHP SQLite Documentation](https://www.php.net/manual/en/book.sqlite3.php)
- [Tailwind CSS](https://tailwindcss.com/)

## 📞 Contacto y Soporte

Para dudas sobre el sistema:
1. Revisa esta documentación
2. Verifica los logs del sistema
3. Prueba en modo sandbox primero
4. Consulta la documentación de PayPal

---

**Última actualización**: Julio 2025
**Versión**: 1.0
**Autor**: Sistema de Donaciones AdoptBuddies

## 📊 Sistema de Logs Avanzado

### 🆕 Nuevo Sistema de Logging
El sistema ahora incluye un logger centralizado con las siguientes características:

#### Tipos de Logs:
- **📋 system.log**: Log principal con toda la actividad
- **💰 donations.log**: Específico para donaciones
- **💳 paypal_ipn.log**: Comunicaciones con PayPal IPN
- **✅ paypal_success.log**: Retornos exitosos de PayPal
- **❌ errors.log**: Errores del sistema
- **⚠️ warnings.log**: Advertencias
- **🟢 success.log**: Operaciones exitosas
- **🔍 debug.log**: Información de depuración

#### Características:
- **Rotación automática**: Los logs se rotan cuando superan 10MB
- **Compresión**: Los logs antiguos se comprimen automáticamente
- **Limpieza**: Se mantienen automáticamente los últimos 30 días
- **Formato estructurado**: `[FECHA HORA] [NIVEL] [ARCHIVO:LÍNEA] - MENSAJE`

#### Visor de Logs:
- **URL**: `http://localhost:3000/logs_viewer.php`
- **Funciones**: Ver, descargar, filtrar logs
- **Auto-refresh**: Se actualiza automáticamente cada 30 segundos
- **Sintaxis destacada**: Diferentes colores para cada nivel de log

#### Funciones de Logging:
```php
// Ejemplos de uso en el código
log_info('Información general');
log_success('Operación exitosa');
log_warning('Advertencia importante');
log_error('Error del sistema');
log_donation('Actividad de donación');
log_paypal('Comunicación con PayPal');
```

### 🔍 Monitoreo y Depuración

#### Debug Info:
- **URL**: `http://localhost:3000/debug.php`
- **Información**: Estado del servidor, base de datos, configuración
- **Pruebas**: Tests automáticos del sistema

#### Logs en Tiempo Real:
```bash
# Ver logs en tiempo real (Windows PowerShell)
Get-Content logs\system.log -Wait

# Buscar errores específicos
Select-String "ERROR" logs\*.log
```