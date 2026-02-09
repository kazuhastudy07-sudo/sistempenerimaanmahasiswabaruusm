
<html>
<head>

	<?php 
	include "assets/config/koneksi.php";
	$iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$iden[logo]";?>">
	<title><?php echo "$iden[aplikasi]";?></title>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/pdfmake.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/vfs_fonts.js'></script>

	<script src='assets/plugins/pdfmake/pdfmake.min.js'></script>
	<script src='assets/plugins/pdfmake/vfs_fonts.js'></script>
	<script type="text/javascript">

		function myFunction()
		{


			var docDefinition = {
				content: [
				{
					text: 'APIKASI E-KTA <?php echo "$iden[aplikasi]";?>\n\n',
					style: 'header',
					alignment: 'center'
				},
				{
					text: [
					'This paragraph uses header style and overrides bold value setting it back to false.\n',
					'Header style in this example sets alignment to justify, so this paragraph should be rendered \n',
					'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
					],
					style: 'header',
					bold: false
				}
				],
				styles: {
					header: {
						fontSize: 11,
						bold: true,
						alignment: 'justify'
					}
				}

			};
			pdfMake.createPdf(docDefinition).download('E-KTA MPW PP KALSEL.pdf');

		}
	</script>
</head>
<body>
	&nbsp;
	<button type="button" onclick="myFunction()">Click Me!</button>
</body>
</html>