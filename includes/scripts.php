<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="<?= urlOf('assets/js/navbar.js') ?>"></script>
<script src="<?= urlOf('assets/js/room.js') ?>"></script>


<!-- navbar scripts -->

<script>
    var icon = document.getElementById("icon");

    icon.onclick=function() {
        document.body.classList.toggle("dark-theme");

        if(document.body.classList.contains("dark-theme")){
            icon.src = "<?= urlOf('assets/img/sun.png')?>";
        }else{
            icon.src = "<?= urlOf('assets/img/moon.png')?>";
        }

    }

</script>