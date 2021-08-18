
		 <script>
            $(document).ready(function(){
               var calendar = $('#calendar').fullCalendar({
                   editable:true,
                   locale:'pt',
                   header:{
                },
                   events: 'loadHorario.php',
               });
            });
		 </script>
	 </head>
	 <body>
	 <br />
	 <h2 align="center"><a href="#">Teste Calendario</a></h2>
	 <br />
	 <div class="container">
		 <div id="calendar"></div>
	 </div>
	 </body>
	 </html>