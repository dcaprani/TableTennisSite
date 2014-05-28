			var done = false;
			function showMenuHint()
			{
				if(done == false){
					var overlay = document.getElementById("overlay");
					var popup = document.getElementById("popup");
					overlay.style.display = "block";
					popup.style.display = "block";
					done = true;
				}
			}
			
			function closePopup()
			{
				var overlay = document.getElementById("overlay");
				var popup = document.getElementById("popup");
				overlay.style.display = "none";
				popup.style.display = "none"; 
			}	