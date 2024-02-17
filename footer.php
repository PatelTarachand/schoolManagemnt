<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php
            if(isset($_SESSION['message'])){
                ?>
                    alertify.set('notifier','position', 'top-right');
                    alertify.success('<?php echo $_SESSION['message']; ?>');
                <?php
                unset($_SESSION['message']);
            }
        ?>
       
    </script>
    </body>
</html>