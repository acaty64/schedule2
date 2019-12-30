<!DOCTYPE html>

<html lang="es">
<head>
	<meta charset="utf-8">
</head>
<body>
	<td align="center" class="td1">
		<table class="table1" width="100%" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td class="td2">
						<a href="http://disponibilidad.ucssfcec.xyz" class="a1" target="_blank"> 
							UCSS-FCEC
						</a>
					</td>
				</tr>
				<tr>
					<td class="td3" width="100%" cellpadding="0" cellspacing="0">
						<table class="table2" align="center" width="570" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td class="td4">
										<h1>Correo de Confirmación</h1>
										<p>Referencia: Requerimiento de Disponibilidad Horaria</p>
										<p>Fecha de confirmación: {{ date('Y-m-d') }}</p>
										<p>La información de los archivos adjuntos serán confirmados por la Dirección de Recursos Humanos.</p>
										<br>
										<p>
											Saludos, <br>
											{{ $data['wdocente'] }}
										</p>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td class="td1">
						<table class="table5" align="center" width="570" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td class="td4" align="center">
										<p class="p1">© 2019 UCSS-FCEC. All rights reserved.</p>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</body>
</html>

<style type="text/css">
	.a1 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		color:#bbbfc3;
		font-size:19px;
		font-weight:bold;
		text-decoration:none
	}
	.a2 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		border-radius:3px;
		color:#fff;
		display:inline-block;
		text-decoration:none;
		background-color:#3097d1;
		border-top:10px solid #3097d1;
		border-right:18px solid #3097d1;
		border-bottom:10px solid #3097d1;
		border-left:18px solid #3097d1; 
	}
	.td1 {
		font-family: Avenir,Helvetica,sans-serif;
		box-sizing: border-box;
	}
	.td2 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		padding:25px 0;
		text-align:center;
	}
	.td3 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		background-color:#ffffff;
		border-bottom:1px solid #edeff2;
		border-top:1px solid #edeff2;
		margin:0;
		padding:0;
		width:100%;
	}
	.td4 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		padding:35px;
	}
	.td5 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
	}
	.table1 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		margin:0;
		padding:0;
		width:100%;
	}
	.table2 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		background-color:#ffffff;
		margin:0 auto;
		padding:0;
		width:570px;
	}
	.table3 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		margin:30px auto;
		padding:0;
		text-align:center;
		width:100%;
	}
	.table4 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
	}
	.table5 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		margin:0 auto;
		padding:0;
		text-align:center;
		width:570px;
	}
	h1 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		color:#2f3133;
		font-size:19px;
		font-weight:bold;
		margin-top:0;
		text-align:left;
	}
	.p1 {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		line-height:1.5em;
		margin-top:0;
		color:#aeaeae;
		font-size:12px;
		text-align:center;
	}
	p {
		font-family:Avenir,Helvetica,sans-serif;
		box-sizing:border-box;
		color:#74787e;
		font-size:16px;
		line-height:1.5em;
		margin-top:0;
		text-align:left;
	}
</style>