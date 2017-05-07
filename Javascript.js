



/*function affiche(){
var poui =document.getElementById('pourcentageO').value;
var pnon =document.getElementById('pourcentageN').value;


}*/



//graphe1

$(document).ready(function(){
				var ctx = $("#mycanvas").get(0).getContext("2d");
                var poui =document.getElementById('pourcentageO').value;
                var pnon =document.getElementById('pourcentageN').value;
                
				//pie chart data
				//sum of values = 360
                //Si l'un des deux est égale a 0
                if (poui==0 && pnon==0){
                    alert("La question n'a été traiter par personne, vous serez automatiquement rediriger vers les questions terminer");
                    document.location.href="enquete_terminer.php"
                }
                

        if (poui >= pnon){
        
				var data = [
					{
                        
						value: poui*360/100,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "OUI "+poui+" %"
					},
					{
						value: pnon*360/100,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "NON "+pnon+" %"
					},
                    
                    
                    {
						value:(poui-pnon)*360/100,
						color: '#E5E8E8',
						highlight: "black",
						label: "RESTE "+(poui-pnon)+"%"
					}
                   
                    
				];
                
                 }else {
                     var data = [
					{
						value: poui*360/100,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "OUI"+poui+"%"
					},
					{
						value: pnon*360/100,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "NON "+pnon+" %"
					},
                    
                    
                    {
						value:(pnon-poui)*360/100,
						color: "#E5E8E8",
						highlight: "black",
						label: "RESTE"+(pnon-poui)+"%"
					}
                   
                    
				];
                 }


                         if (poui==100 || pnon==100){
        
				var data = [
					{
                        
						value: poui*360/100,
						color: "cornflowerblue",
						highlight: "lightskyblue",
						label: "OUI "+poui+" %"
					},
					{
						value: pnon*360/100,
						color: "lightgreen",
						highlight: "yellowgreen",
						label: "NON "+pnon+" %"
					}
                   
                    
				];
                
                 }

				//draw
				var piechart = new Chart(ctx).Pie(data);
			});