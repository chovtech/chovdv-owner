<?php
/**
 * Performance Optimizer for Live Hosting
 * This file provides monitoring and optimization tools for the payment processing system
 */

class PerformanceOptimizer {
    private $start_time;
    private $memory_start;
    private $config;
    private $metrics = [];
    
    public function __construct($config = []) {
        $this->start_time = microtime(true);
        $this->memory_start = memory_get_usage();
        
        // Default configuration optimized for live hosting
        $this->config = array_merge([
            'send_emails' => true,
            'send_whatsapp' => true,
            'email_timeout' => 3,
            'batch_notifications' => true,
            'use_transactions' => true,
            'log_errors' => true,
            'performance_logging' => false,
            'connection_pooling' => true,
            'query_cache' => true,
            'max_execution_time' => 30,
            'memory_limit' => '256M',
            'disable_notifications_for_speed' => false, // Set to true for maximum speed
            'use_prepared_statements' => true,
            'batch_database_operations' => true,
            'async_notifications' => true
        ], $config);
        
        $this->applyOptimizations();
    }
    
    private function applyOptimizations() {
        // PHP-level optimizations
        ini_set('max_execution_time', $this->config['max_execution_time']);
        ini_set('memory_limit', $this->config['memory_limit']);
        ignore_user_abort(true);
        
        // Disable notifications if speed is priority
        if ($this->config['disable_notifications_for_speed']) {
            $this->config['send_emails'] = false;
            $this->config['send_whatsapp'] = false;
        }
    }
    
    public function optimizeDatabaseConnection($link) {
        if ($this->config['connection_pooling']) {
            mysqli_query($link, "SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");
            mysqli_query($link, "SET SESSION wait_timeout = 60");
            mysqli_query($link, "SET SESSION interactive_timeout = 60");
            mysqli_query($link, "SET SESSION net_read_timeout = 30");
            mysqli_query($link, "SET SESSION net_write_timeout = 30");
        }
    }
    
    public function logMetric($stage, $data = []) {
        $execution_time = microtime(true) - $this->start_time;
        $memory_used = memory_get_usage() - $this->memory_start;
        
        $this->metrics[$stage] = [
            'time' => round($execution_time * 1000, 2),
            'memory' => round($memory_used / 1024, 2),
            'data' => $data
        ];
        
        if ($this->config['performance_logging']) {
            error_log("PERFORMANCE: $stage - Time: " . round($execution_time * 1000, 2) . "ms, Memory: " . round($memory_used / 1024, 2) . "KB");
        }
    }
    
    public function getMetrics() {
        return $this->metrics;
    }
    
    public function getConfig() {
        return $this->config;
    }
    
    public function shouldSendNotifications() {
        return $this->config['send_emails'] || $this->config['send_whatsapp'];
    }
    
    public function isAsyncNotificationsEnabled() {
        return $this->config['async_notifications'];
    }
}

/**
 * Live Hosting Performance Tips:
 * 
 * 1. Database Optimization:
 *    - Use prepared statements (already implemented)
 *    - Batch database operations (already implemented)
 *    - Optimize indexes on frequently queried columns
 *    - Consider read replicas for heavy read operations
 * 
 * 2. Email Optimization:
 *    - Use local SMTP server if available
 *    - Implement email queuing system
 *    - Use lightweight email templates
 *    - Consider using transactional email services (SendGrid, Mailgun)
 * 
 * 3. WhatsApp API Optimization:
 *    - Implement rate limiting
 *    - Use webhooks instead of polling
 *    - Cache API responses
 * 
 * 4. Server Configuration:
 *    - Enable OPcache for PHP
 *    - Use Redis/Memcached for caching
 *    - Configure proper MySQL settings
 *    - Use CDN for static assets
 * 
 * 5. Code Optimization:
 *    - Minimize database queries
 *    - Use connection pooling
 *    - Implement proper error handling
 *    - Use async processing where possible
 */

/**
 * Configuration Examples for Different Environments:
 */

// Development/Testing (Fastest)
$dev_config = [
    'send_emails' => false,
    'send_whatsapp' => false,
    'performance_logging' => true,
    'disable_notifications_for_speed' => true
];

// Production (Balanced)
$prod_config = [
    'send_emails' => true,
    'send_whatsapp' => true,
    'email_timeout' => 5,
    'performance_logging' => false,
    'async_notifications' => true
];

// High-Traffic Production (Speed Priority)
$high_traffic_config = [
    'send_emails' => false, // Disable for speed
    'send_whatsapp' => true, // Keep WhatsApp (faster than email)
    'email_timeout' => 2,
    'performance_logging' => false,
    'batch_notifications' => true,
    'disable_notifications_for_speed' => false
];

// Usage Example:
// $optimizer = new PerformanceOptimizer($prod_config);
// $optimizer->optimizeDatabaseConnection($link);
// $optimizer->logMetric('database_queries', ['queries' => 10]);
?> 