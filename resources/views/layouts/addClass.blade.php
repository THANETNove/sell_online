<script>
    $(document).ready(function(){
        let actual_link =  window.location.pathname;
      console.log("actual_link",actual_link);
         if (actual_link === "/") {
            $("#home").addClass("active");
            $("#home-footer").addClass("active");
        }else if (actual_link === "/shop") {
            $("#shop").addClass("active");
            $("#shop-footer").addClass("active");
        }else if (actual_link === "/product") {
            $("#product").addClass("active");
            $("#product-footer").addClass("active");
        } 

     
    });
</script>