</div>

<footer>

</footer>

<script type="text/javascript" src="Public/js/lib/jquery-2.2.2.min.js"></script>
<script type="text/javascript" src="Public/js/lib/materialize.min.js"></script>
<script>
    var data = <?= json_encode($result) ?>;
    console.log(data);
</script>
<script type="text/javascript" src="Public/js/app/main.js"></script>
</body>
</html>