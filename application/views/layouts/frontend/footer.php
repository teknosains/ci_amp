                </div>
            </div>
        </div>
    </main>
  </div>
<script>var site_url = '<?php echo site_url();?>';</script>
<script type="text/javascript" src="<?php echo resource_url('/assets/js/jquery-1.10.2.min.js');?>"></script>
<script type="text/javascript" defer src="<?php echo resource_url('/assets/js/material.min.js');?>"></script>

<!---Inject additional JS-->
<?php if (isset($js)) { foreach($js as $jx) {?>
<script src="<?php echo resource_url($jx);?>"></script>
<?php } }?>
<script>
$(function() {
    //search
    $("#search").on("keypress", function(e) {
        var sval = $(this).val();
        if (e.which == 13) {
            if (sval) {
                window.location.href = site_url + '?query=' + sval;
            }
        }
    });
});
</script>
 </body>
</html>
