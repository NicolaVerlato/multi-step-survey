<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Survey</title>
	</head>
	<body style="width: 50%; margin: 0 auto; background-color:#F5F6F8;font-family:-apple-system, BlinkMacSystemFont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', Arial, sans-serif;box-sizing:border-box;font-size:16px;">
		<div style="background-color:#fff;margin:30px;box-sizing:border-box;font-size:16px;">
			<h1 style="padding:40px;box-sizing:border-box;font-size:24px;color:#ffffff;background-color:#cb5f51;margin:0;">Sondaggio Aziende</h1>
			<!-- <p style="padding:40px 40px 20px 40px;margin:0;box-sizing:border-box;font-size:16px;">A user has submitted a survey.</p>
			<h2 style="padding:20px 40px;margin:0;color:#394453;box-sizing:border-box;">Sondaggio</h2> -->
			<div style="box-sizing:border-box;padding:0 40px 20px;">
				<table style="border-collapse:collapse;width:100%;">
					<tbody>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Email</td>
							<td style="text-align:right;"><?=$_POST['email']?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Sei soddisfatto della tua esperienza con noi?</td>
							<td style="text-align:right;"><?=htmlspecialchars($_POST['rating_esperienza'], ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Come abbiamo gestito il tuo progetto?</td>
							<td style="text-align:right;"><?=htmlspecialchars($_POST['rating_gestione_progetto'], ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Che punteggio daresti al nostro servizio?</td>
							<td style="text-align:right;"><?=htmlspecialchars($_POST['rating_servizio'], ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Di quali servizi hai beneficiato?</td>
							<td style="text-align:right;"><?=htmlspecialchars(implode(', ', $_POST['contact_pref']), ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Raccomanderesti la nostra agenzia ad altri?</td>
							<td style="text-align:right;"><?=htmlspecialchars($_POST['si_no'], ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Hai consigliato Baobab:</td>
							<td style="text-align:right;"><?=htmlspecialchars($_POST['consiglio'], ENT_QUOTES)?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Quali servizi raccomanderesti ad altri?</td>
							<td style="text-align:right;"><?=htmlspecialchars(implode(', ', $_POST['contact_pref_altri']), ENT_QUOTES)?></td>
						</tr>
						
						<!-- <tr>
							<td style="padding:15px 0;text-decoration:underline;">Come descriveresti la tua esperienza con noi?</td>
							<td style="text-align:right;"><?=htmlspecialchars($desc_exp, ENT_QUOTES)?></td>
						</tr> -->
						<table style="border-collapse:collapse;width:100%;">
							<tbody>
								<tr>
									<td style="padding:15px 0;"><b>In che modo valuteresti il lavoro svolto in:</b> </td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">1. Primo contatto</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['primo_contatto'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">2. Consulenza</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['consulenza'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">3. Ascolto e comprensione</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['ascolto'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">4. Organizzazione</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['organizzazione'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">5. Tempistica</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['tempistica'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">6. Precisione</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['precisione'], ENT_QUOTES)?></td>
								</tr>
								<tr>
									<td style="padding:15px 0;text-decoration:underline;">7. Creatività</td>
									<td style="text-align:right;"><?=htmlspecialchars($_POST['creativita'], ENT_QUOTES)?></td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
							<tr>
								<td style="padding:15px 0;text-decoration:underline;"><b>Quale servizio gratuito vorresti?</b> </td>
								<td style="text-align:right;"><?=htmlspecialchars($_POST['servizio_gratuito'], ENT_QUOTES)?></td>
							</tr>
							</tbody>
						</table>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>