$(document).ready(function() {
	var btSolve = document.getElementById("btnSolve").onclick = function() {
		var a = document.getElementById("num_a").value;
		var b = document.getElementById("num_b").value;
		var c = document.getElementById("num_c").value;
		//alert("a,b,c = " + a + " " + b + " " + c);
		
		var result = "";
		if(a == 0) {
			result = "Đây là phương trình bậc nhất. Có nghiệm là x = " + (-c/b);
		} else {
			var delta = b*b - 4*a*c;
			if(delta > 0) {
				var x1 = (-b + Math.sqrt(delta))/(2*a);
				var x2 = (-b - Math.sqrt(delta))/(2*a);
				
				result = "Phương trình này có 2 nghiệm phân biệt<br>x1 = " + x1 + "<br>x2 = " + x2;
			} else if(delta == 0) {
				var x = -b/(2*a);
				result = "Phương trình này có nghiệm kép x1 = x2 = " + x;
			} else {
				result = "Phương trình này vô nghiệm @_@";
			}
		}
		
		document.getElementById("lbResult").innerHTML = result;
	}
});