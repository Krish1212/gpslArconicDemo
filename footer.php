<script src="js/jquery.min.js"></script>
<script src="js/bundle.js"></script>
<?php if(isset($from) && $from == "home"){?>
    <script>
        (function() {
            var cx = '008683130934383105744:-8atcd4pn0k';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
    </script>
<? }?>