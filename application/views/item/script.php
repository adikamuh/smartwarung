<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            margin:10,
            autoWidth:true,
            // autoHeigth:true,
            items:1
        });
        $( "#target" ).submit(function( event ) {
            if(parseInt($('#stock').text()) < parseInt($('#quantity').val())){
                alert( "Pesanan lebih banyak dari stok yang ada!" );
                event.preventDefault();
            };
            <?php if($this->session->userdata('role')==null): ?>
            alert("Anda harus login terlebih dahulu!");
            event.preventDefault();
            <?php endif; ?>
        });
    });
</script>
</body>
</html>