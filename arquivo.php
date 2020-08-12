<html>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

	<head>
		<title>

			Simulador de crédito
		</title>

	</head>

	<body>
	
		<section class="sec1">
		
			<fieldset id="fld1">Simulador de credito
		
			<div id="div1">
		
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Escolha o valor do seu crédito aqui<br>
			<input type="radio" name="valor_escolhido"
				<?php 

					if(isset($valor_escolhido)&& $valor_escolhido=="5000")

					echo"checked";

			?>
				value="5000">R$5000.00<br>
			<input type="radio" name="valor_escolhido"
				<?php 

					if(isset($valor_escolhido)&& $valor_escolhido=="10000")

					echo"checked";

				?>
			value="10000">R$10000.00 <br>
			<input type="radio" name="valor_escolhido"
				<?php 

					if(isset($valor_escolhido)&& $valor_escolhido=="20000")

					echo"checked";

				?>
			value="20000">R$20000.00<br>
			<input type="radio" name="valor_escolhido"
			<?php 

			if(isset($valor_escolhido)&& $valor_escolhido=="30000")

			echo"checked";

			?>
			value="30000">R$30000.00<br>
			<input type="radio" name="valor_escolhido"
				<?php 

					if(isset($valor_escolhido)&& $valor_escolhido=="50000")

					echo"checked";

				?>
			value="50000">R$50000.00<br><br>
			Nome Completo:<br>
			<input type="text" id="nome" name="nome"
				<?php
					if(isset($nome))

					echo"checked";

				?>
			><br><br>
			Cadastro Pessoa Física(CPF):<br>
			<input type="text" id="CPF" name="CPF"
				<?php
					if(isset($CPF))

						echo"checked";

				?>
			>
			<br><br>
			E-mail:<br>
			<input type="text" id="E-mail" name="E-mail"
				<?php
					if(isset($email))
					echo"checked";

				?>
			>
			<br><br>
			Telefone(DDD+Whatsapp):<br>
			<input type="text" id="telefone_zap" name="telefone_zap"
				<?php
					if(isset($telefone_zap))

					echo"checked";

				?>
			><br><br>
			<input type="submit" id="submit_1" name="submit" value="Solicitar">
			</form>


			<?php
			
				function input($data) 
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				function mask($val, $mask)
				{
					$maskared = '';
					$k = 0;
					for($i = 0; $i<=strlen($mask)-1; $i++)
					{
					  if($mask[$i] == '#')
					  {
						 if(isset($val[$k]))
						  $maskared .= $val[$k++];
					  }
					  else
					{
						if(isset($mask[$i]))
						$maskared .= $mask[$i];
						}
					}
					return $maskared;
				}

				
				$nome="";
				$valor_escolhido="";
				$CPF="";
				$email="";
				$telefone_zap="";
					
				
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
					if (empty($_POST["valor_escolhido"]))
					{
						$valor_escolhido="<p class='php_paragrafo'>Escolha um valor</p>";
						
					} 
					else
					{
						$valor_escolhido=input($_POST["valor_escolhido"]);					
					
					}
					if (empty($_POST["CPF"]))
					{
						$CPF="<p class='php_paragrafo'>Escreva o seu CPF</p>";
						
					} 
					else
					{
						
						$CPF=input($_POST["CPF"]);					
					
					}
					
					if (empty($_POST["nome"]))
					{
					
						$nome="<p class='php_paragrafo'>Escreva o seu nome</p>";
					
					}
					else
					{
						$nome=input($_POST["nome"]);
					}
					if (empty($_POST["E-mail"]))
					{
					
						$email="<p class='php_paragrafo'>Escreva o seu E-mail</p>";
					
					}
					else
					{
						$email=input($_POST["E-mail"]);
					}
					if (empty($_POST["telefone_zap"]))
					{
					
						$telefone_zap="<p class='php_paragrafo'>Escreva o seu telefone (DDD+whatsapp) </p>";
					
					}
					else
					{
						$telefone_zap=input($_POST["telefone_zap"]);
					}
					
					
				}
			?>
				
			<?php
				if (empty($_POST['valor_escolhido']))
				{
					
					echo $valor_escolhido;
				}
				else
				{
					if($valor_escolhido!="5000")
					{

						$valor_um = mask($valor_escolhido, "##,####");
					
					}	
					else
					{
						$valor_um = mask($valor_escolhido, "#,####");
					}
						
					echo "<p>Valor escolhido: R$".$valor_um.".00"."</p>";
				}
			?>
			<?php
				if (empty($_POST['nome']))
				{
					
					echo $nome;
				}
				else
				{
						
					echo "<p>"."Nome: ".$nome."</p>";
				}
			?>
			<?php
				if (empty($_POST['CPF']))
				{

					
					echo $CPF;
				}
				else
				{
					
					$CPF_mask=mask($CPF,"###.###.###-##");
					echo "<p>"."CPF: ".$CPF_mask."</p>";
				}
				
			?>
			<?php
				if (empty($_POST['E-mail']))
				{
					
					echo $email;
				}
				else
				{
						
					echo "<p>"."E-mail: ".$email."</p>";
				}
				
			?>
			<?php
				if (empty($_POST['telefone_zap']))
				{
				
					
					echo $telefone_zap;
				}
				else
				{
					
					$zap_telefone=mask($telefone_zap,"#######-####");
						
					echo "<p>"."Telefone (ddd+whastsapp): ".$zap_telefone."</p>";
				}
				
			?>
			
				</div>
			</fieldset>
		</section>	
	</body>

</html>
