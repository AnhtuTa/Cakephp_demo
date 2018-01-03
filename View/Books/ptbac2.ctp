
<title>Giải pt bậc 2</title>
<style>
	input {
		width: 120px;
		height: 5px;
	}
	.div_abc {
		padding: 2px
	}
	#btnSolve {
		width: 50px;
		height: 20px;
		background: blue;
		color: white;
		cursor: pointer;
		margin-left: 80px;
	}
</style>

<?php echo $this->Html->script('book/jquery-3.2.1.min.js'); echo "\n";?>
<?php echo $this->Html->script('book/ptbac2.js'); echo "\n";?>

<h2>Giải phương trình bậc 2: ax<sup>2</sup> + bx + c = 0</h2>
<form>
	<div class="div_abc">Nhập số a <input type="text" id="num_a" name="numA"></div>
	<div class="div_abc">Nhập số b <input type="text" id="num_b" name="numB"></div>
	<div class="div_abc">Nhập số c <input type="text" id="num_c" name="numC"></div>
	<div id="btnSolve">Giải pt</div>
	<label id="lbResult"></label>
</form>
<script>
  (function() {
    var cx = '006699419362551519039:bpvraz38qne';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>