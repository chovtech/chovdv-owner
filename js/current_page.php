<script>
    $(document).ready(function(){
        
        var url = new URL(window.location.href);
        
        localStorage.setItem('current_page', url);
    });
    
    // $(document).ready(function() {
        
    //     var url = localStorage.getItem('current_page');
        
    //     var urlnew = new URL(window.location.href);
        
    //     // Function to check internet connection status
    //     function checkInternetConnection() {
    //         if (navigator.onLine) {
                
    //             if(urlnew != url)
    //             {
    //                 // Function to check internet connection status
    //                 function checkInternetConnection() {
    //                     if (navigator.onLine) {
    //                         window.location.href = url;
    //                     } else {
    //                         window.location.href = '../no-internet';
    //                     }
    //                 }
                    
                    
    //                 // Initial check
    //                 checkInternetConnection();
                
    //             }
    //             else
    //             {
    //                 // alert('something');
    //             }
    //         } else {
    //             window.location.href = '<?php echo $defaultUrl;?>no-internet';
    //         }
    //     }
            
            
    //     // Initial check
    //     checkInternetConnection();
        
    //     // Event listener for online/offline status changes
    //     $(window).on('online offline', checkInternetConnection);
    // });
    
</script>
