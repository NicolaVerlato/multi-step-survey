<?php
// Output messages
$response = '';
// Check if the form was submitted
if (isset($_POST['servizio_gratuito'], $_POST['rating_servizio'], $_POST['rating_esperienza'], $_POST['rating_gestione_progetto'], $_POST['contact_pref'], $_POST['contact_pref_altri'], $_POST['email'], $_POST['si_no'], $_POST['primo_contatto'], $_POST['consulenza'], $_POST['ascolto'], $_POST['organizzazione'], $_POST['tempistica'], $_POST['precisione'], $_POST['creativita'], $_POST['consiglio'])) {
	// Where to send the mail? It should be your email address
	$to      = 'marketing@baobabcommunication.it';
	// Mail from
	$from    = $_POST['email'];
	// Mail subject
	$subject = 'Risposta dal sondaggio';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	// Try to send the mail
	if (mail($to, $subject, $email_template, $headers)) {
		// Success
		$response = '<h3>Visita il nostro sito</h3><p>È <a href="https://www.baobabcommunication.it/">qui</a></p>';		
	} else {
		// Fail
		$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondaggio</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<body <?php if (!empty($_POST)): ?>style="background-color: #1d262d;"<?php endif; ?>>

    <div class="container" <?php if (!empty($_POST)): ?>style="display: none;"<?php endif; ?>>
    <aside>
        <img class="logo" src="img/logo-baobab-01.svg" alt="Logo" style="width: 150px; padding: 20px 0;">
        <img id="image" src="" alt="">
    </aside>
    <form action="" name="form" class="survey-form" method="post" >
        
        <div id="stepper-counter" style="text-align: center; color: #bbbbbb; font-size: 14px;">
            <span id="counter"></span>/11
        </div>
        <div id="step-container" style="margin-top: 10px;display: flex; justify-content: center;"> <!-- text-align:center;margin-top:40px; -->
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>

        <!-- inizio -->
        <div class="prologo step-content current">
            <img src="img/download.png" alt="Logo">
            <h1>La tua opinione per noi è importante!</h1>
            <p class="initial-text">Ti chiediamo 3 minuti di tempo per farcela conoscere 🙂 <br>
                e ti offriamo in cambio 1 gift service GRATUITO a scelta tra:</p>
    
            <ul>
                <li>⁃	audit del tuo sito (scopri come migliorarlo)</li>
                <li>⁃	analisi social media (costruisci contenuti più performanti)</li>
                <li>⁃	30 minuti di call di consulenza on-offline</li>
            </ul>
            <div style="font-size: 22px;">
                <span>Grazie di cuore! 🙏</span><br>
                <span>Baobab Team</span>
            </div>
            <div class="buttons">
                <button type="button" class="btn" onclick="nextPrev(1)">Iniziamo!</button>
            </div>
        </div>

        <!-- prima domanda -->
        <div class="step-content">
            <div class="fields"> 
                <div style="margin: 1em 0;">

                    <label for="email" style="font-size: 22px;">Qual è la tua email? *</label>
                </div>
                <div>
                    <input id="email" type="email" name="email" placeholder="example@mail.it">
                </div>
            </div>
            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>* Compila questo campo o controlla che la tua email sia corretta *</i></div>         
            </div>
        </div>

        <!-- Seconda domanda -->
        <div class="step-content">
        
            <div class="fields">
                <p>Sei soddisfatt* della tua esperienza con noi? *</p>
                <div class="rating icons">
                    <div class="item-icons">
                        <input type="radio" name="rating_esperienza" id="radio0" value="Terribile">
                        <label for="radio0">
                            <div><img src="img/icons/ico-01.png" alt="Terribile"></div>
                            <div>Terribile</div>
                        </label>
                    </div>
                    <div class="item-icons">
                        <input type="radio" name="rating_esperienza" id="radio1" value="Non proprio">
                        <label for="radio1">
                            <div><img src="img/icons/ico-02.png" alt="Non proprio"></div>
                            <div>Non proprio</div>
                        </label>
                    </div>
                    <div class="item-icons selected">
                        <input type="radio" name="rating_esperienza" id="radio2" value="Ok">
                        <label for="radio2">
                            <div><img src="img/icons/ico-03.png" alt="Ok"></div>
                            <div>Ok</div>
                        </label>
                    </div>
                    <div class="item-icons">
                        <input type="radio" name="rating_esperienza" id="radio3" value="Molto">
                        <label for="radio3">
                            <div><img src="img/icons/ico-04.png" alt="Molto"></div>
                            <div>Molto</div>
                        </label>
                    </div>
                    <div class="item-icons">
                        <input type="radio" name="rating_esperienza" id="radio4" value="Fantastico">
                        <label for="radio4">
                            <div><img src="img/icons/ico-05.png" alt="Fantastico"></div>
                            <div>Fantastico</div>
                        </label>
                    </div>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Terza domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Come abbiamo gestito il tuo progetto?</p>
                <div class="rating range">
                    <div style="margin-top: 20px;">
                        <input type="range" min="0" max="10" value="0" name="rating_gestione_progetto" id="range_gestione" class="slider">
                        <!-- <label for="range_gestione"></label> -->
                    </div>
                    <div id="gestione-progetto" class="rage-numbers">
                        <div class="selected-1">0</div>
                        <div style="color: white;">1</div>
                        <div>2</div>
                        <div style="color: white;">3</div>
                        <div>4</div>
                        <div style="color: white;">5</div>
                        <div>6</div>
                        <div style="color: white;">7</div>
                        <div>8</div>
                        <div style="color: white;">9</div>
                        <div>10</div>
                    </div>
                    <!-- <input type="radio" name="rating_gestione_progetto" id="radio_prog0" value="0">
                    <label for="radio_prog0">0</label> -->
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Quarta domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Che punteggio daresti al nostro servizio?</p>
                <div class="rating range">
                    <div style="margin-top: 20px;">
                        <input type="range" min="0" max="10" value="0" name="rating_servizio" id="range_servizio" class="slider">
                        <!-- <label for="range_servizio"></label> -->
                    </div>
                    <div id="punteggio" class="rage-numbers">
                        <div class="selected-2">0</div>
                        <div style="color: white;">1</div>
                        <div>2</div>
                        <div style="color: white;">3</div>
                        <div>4</div>
                        <div style="color: white;">5</div>
                        <div>6</div>
                        <div style="color: white;">7</div>
                        <div>8</div>
                        <div style="color: white;">9</div>
                        <div>10</div>
                    </div>
                    <!-- <input type="radio" name="rating_servizio" id="radio_serv0" value="0">
                    <label for="radio_serv0">0</label> -->
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>
        
        <!-- Quinta domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Di quali servizi hai beneficiato? *</p>
                <div class="group">
                    <div class="group-label">
                        <label for="check1">
                            <input type="checkbox" name="contact_pref[]" id="check1" value="Brainstorming">
                            <span>Brainstorming</span>
                        </label>
                    </div>

                    <div class="group-label">
                        <label for="check2">
                            <input type="checkbox" name="contact_pref[]" id="check2" value="Logo">
                            <span>Logo</span>
                        </label>
                    </div>

                    <div class="group-label">
                        <label for="check3">
                            <input type="checkbox" name="contact_pref[]" id="check3" value="Company profile">
                            <span>Company profile</span>
                        </label>
                    </div>
                    <div class="group-label">
                        <label for="check4">
                            <input type="checkbox" name="contact_pref[]" id="check4" value="Social">
                            <span>Social Media</span>
                        </label>
                    </div>
                    <div class="group-label">
                        <label for="check5">
                            <input type="checkbox" name="contact_pref[]" id="check5" value="Website">
                            <span>Website</span>
                        </label>
                    </div>
                    <div class="group-label">
                        <label for="check6">
                            <input type="checkbox" name="contact_pref[]" id="check6" value="Seo">
                            <span>SEO</span>
                        </label>		
                    </div>
                    <div class="group-label">
                        <label for="check7">
                            <input type="checkbox" name="contact_pref[]" id="check7" value="ADV">
                            <span>Google ADV</span>
                        </label>
                    </div>
                    <div class="group-label">
                        <label for="check8">
                            <input type="checkbox" name="contact_pref[]" id="check8" value="Virtual Tour">
                            <span>Virtual Tour</span>
                        </label>
                    </div>
                    <div class="group-label">
                        <label for="check9">
                            <input type="checkbox" name="contact_pref[]" id="check9" value="Evento">
                            <span>Evento</span>
                        </label>				
                    </div>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Sesta domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Raccomanderesti la nostra agenzia ad altri? *</p>
                <div class="rating space-around">
                    <input type="radio" name="si_no" id="no" value="No">
                    <label for="no">No</label>
                    <input type="radio" name="si_no" id="si" value="Si">
                    <label for="si">Si</label>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

         <!-- Settima domanda -->
         <div class="step-content">
            <div class="fields">
                <p>Hai consigliato Baobab</p>
                <div class="rating range">
                    <div style="margin-top: 20px;">
                        <input type="range" min="0" max="10" value="0" name="consiglio" id="consiglio" class="slider">
                        <!-- <label for="consiglio"></label> -->
                    </div>
                    <div id="consiglio-rating" class="rage-numbers">
                        <div class="selected-3">0</div>
                        <div style="color: white;">1</div>
                        <div>2</div>
                        <div style="color: white;">3</div>
                        <div>4</div>
                        <div style="color: white;">5</div>
                        <div>6</div>
                        <div style="color: white;">7</div>
                        <div>8</div>
                        <div style="color: white;">9</div>
                        <div>10</div>
                    </div>
                    <div class="rating-footer">
                        <span>Volte</span>
                        <!-- <span>Molto Soddisfatt*</span> -->
                    </div>
                    <!-- <input type="radio" name="consiglio" id="consiglio_si" value="0 Volte">
                    <label for="consiglio_si"><span style="margin-left: 40px;">0 Volte</span></label>
                    <input type="radio" name="consiglio" id="consiglio_no" value="Più di 2 meno di 10">
                    <label for="consiglio_no"><span style="margin-left: 40px;">Più di 2 meno di 10</span></label> -->
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Ottava domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Quali servizi raccomanderesti ad altri? *</p>
                <div class="group">
                <div class="group-label-2">
                        <label for="check_altri_1">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_1" value="Brainstorming">
                            <span>Brainstorming</span>
                        </label>
                    </div>

                    <div class="group-label-2">
                        <label for="check_altri_2">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_2" value="Logo">
                            <span>Logo</span>
                        </label>
                    </div>

                    <div class="group-label-2">
                        <label for="check_altri_3">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_3" value="Company profile">
                            <span>Company profile</span>
                        </label>
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_4">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_4" value="Social">
                            <span>Social Media</span>
                        </label>
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_5">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_5" value="Website">
                            <span>Website</span>
                        </label>
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_6">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_6" value="Seo">
                            <span>SEO</span>
                        </label>		
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_7">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_7" value="ADV">
                            <span>Google ADV</span>
                        </label>
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_8">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_8" value="Virtual Tour">
                            <span>Virtual Tour</span>
                        </label>
                    </div>
                    <div class="group-label-2">
                        <label for="check_altri_9">
                            <input type="checkbox" name="contact_pref_altri[]" id="check_altri_9" value="Evento">
                            <span>Evento</span>
                        </label>				
                    </div>
                    <!-- <label for="check_altri_1">
                        <input type="checkbox" name="contact_pref_altri[]" id="check_altri_1" value="Brainstorming">
                        Brainstorming
                    </label> -->
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Nona domanda -->
        <div class="step-content more-questions">
            <div class="fields">
                <p style="font-size: 20px;">In che modo valuteresti il lavoro svolto in:</p>

                <div class="rating">
                    <div class="title">
                        <p>1. Primo contatto *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="primo_contatto" id="primo_contatto0" value="0">
                        <label for="primo_contatto0">0</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto1" value="1">
                        <label for="primo_contatto1">1</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto2" value="2">
                        <label for="primo_contatto2">2</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto3" value="3">
                        <label for="primo_contatto3">3</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto4" value="4">
                        <label for="primo_contatto4">4</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto5" value="5">
                        <label for="primo_contatto5">5</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto6" value="6">
                        <label for="primo_contatto6">6</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto7" value="7">
                        <label for="primo_contatto7">7</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto8" value="8">
                        <label for="primo_contatto8">8</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto9" value="9">
                        <label for="primo_contatto9">9</label>
                        <input type="radio" name="primo_contatto" id="primo_contatto10" value="10">
                        <label for="primo_contatto10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating">
                    <div class="title">
                        <p>2. Consulenza *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="consulenza" id="consulenza0" value="0">
                        <label for="consulenza0">0</label>
                        <input type="radio" name="consulenza" id="consulenza1" value="1">
                        <label for="consulenza1">1</label>
                        <input type="radio" name="consulenza" id="consulenza2" value="2">
                        <label for="consulenza2">2</label>
                        <input type="radio" name="consulenza" id="consulenza3" value="3">
                        <label for="consulenza3">3</label>
                        <input type="radio" name="consulenza" id="consulenza4" value="4">
                        <label for="consulenza4">4</label>
                        <input type="radio" name="consulenza" id="consulenza5" value="5">
                        <label for="consulenza5">5</label>
                        <input type="radio" name="consulenza" id="consulenza6" value="6">
                        <label for="consulenza6">6</label>
                        <input type="radio" name="consulenza" id="consulenza7" value="7">
                        <label for="consulenza7">7</label>
                        <input type="radio" name="consulenza" id="consulenza8" value="8">
                        <label for="consulenza8">8</label>
                        <input type="radio" name="consulenza" id="consulenza9" value="9">
                        <label for="consulenza9">9</label>
                        <input type="radio" name="consulenza" id="consulenza10" value="10">
                        <label for="consulenza10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating">
                    <div class="title">
                        <p>2. Ascolto e comprensione *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="ascolto" id="ascolto0" value="0">
                        <label for="ascolto0">0</label>
                        <input type="radio" name="ascolto" id="ascolto1" value="1">
                        <label for="ascolto1">1</label>
                        <input type="radio" name="ascolto" id="ascolto2" value="2">
                        <label for="ascolto2">2</label>
                        <input type="radio" name="ascolto" id="ascolto3" value="3">
                        <label for="ascolto3">3</label>
                        <input type="radio" name="ascolto" id="ascolto4" value="4">
                        <label for="ascolto4">4</label>
                        <input type="radio" name="ascolto" id="ascolto5" value="5">
                        <label for="ascolto5">5</label>
                        <input type="radio" name="ascolto" id="ascolto6" value="6">
                        <label for="ascolto6">6</label>
                        <input type="radio" name="ascolto" id="ascolto7" value="7">
                        <label for="ascolto7">7</label>
                        <input type="radio" name="ascolto" id="ascolto8" value="8">
                        <label for="ascolto8">8</label>
                        <input type="radio" name="ascolto" id="ascolto9" value="9">
                        <label for="ascolto9">9</label>
                        <input type="radio" name="ascolto" id="ascolto10" value="10">
                        <label for="ascolto10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating">
                    <div class="title">
                        <p>4. Organizzazione *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="organizzazione" id="organizzazione0" value="0">
                        <label for="organizzazione0">0</label>
                        <input type="radio" name="organizzazione" id="organizzazione1" value="1">
                        <label for="organizzazione1">1</label>
                        <input type="radio" name="organizzazione" id="organizzazione2" value="2">
                        <label for="organizzazione2">2</label>
                        <input type="radio" name="organizzazione" id="organizzazione3" value="3">
                        <label for="organizzazione3">3</label>
                        <input type="radio" name="organizzazione" id="organizzazione4" value="4">
                        <label for="organizzazione4">4</label>
                        <input type="radio" name="organizzazione" id="organizzazione5" value="5">
                        <label for="organizzazione5">5</label>
                        <input type="radio" name="organizzazione" id="organizzazione6" value="6">
                        <label for="organizzazione6">6</label>
                        <input type="radio" name="organizzazione" id="organizzazione7" value="7">
                        <label for="organizzazione7">7</label>
                        <input type="radio" name="organizzazione" id="organizzazione8" value="8">
                        <label for="organizzazione8">8</label>
                        <input type="radio" name="organizzazione" id="organizzazione9" value="9">
                        <label for="organizzazione9">9</label>
                        <input type="radio" name="organizzazione" id="organizzazione10" value="10">
                        <label for="organizzazione10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating">
                    <div class="title">
                        <p>5. Tempistica *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="tempistica" id="tempistica0" value="0">
                        <label for="tempistica0">0</label>
                        <input type="radio" name="tempistica" id="tempistica1" value="1">
                        <label for="tempistica1">1</label>
                        <input type="radio" name="tempistica" id="tempistica2" value="2">
                        <label for="tempistica2">2</label>
                        <input type="radio" name="tempistica" id="tempistica3" value="3">
                        <label for="tempistica3">3</label>
                        <input type="radio" name="tempistica" id="tempistica4" value="4">
                        <label for="tempistica4">4</label>
                        <input type="radio" name="tempistica" id="tempistica5" value="5">
                        <label for="tempistica5">5</label>
                        <input type="radio" name="tempistica" id="tempistica6" value="6">
                        <label for="tempistica6">6</label>
                        <input type="radio" name="tempistica" id="tempistica7" value="7">
                        <label for="tempistica7">7</label>
                        <input type="radio" name="tempistica" id="tempistica8" value="8">
                        <label for="tempistica8">8</label>
                        <input type="radio" name="tempistica" id="tempistica9" value="9">
                        <label for="tempistica9">9</label>
                        <input type="radio" name="tempistica" id="tempistica10" value="10">
                        <label for="tempistica10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating"> 
                    <div class="title">
                        <p>6. Precisione *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>
                    <div class="radio">
                        <input type="radio" name="precisione" id="precisione0" value="0">
                        <label for="precisione0">0</label>
                        <input type="radio" name="precisione" id="precisione1" value="1">
                        <label for="precisione1">1</label>
                        <input type="radio" name="precisione" id="precisione2" value="2">
                        <label for="precisione2">2</label>
                        <input type="radio" name="precisione" id="precisione3" value="3">
                        <label for="precisione3">3</label>
                        <input type="radio" name="precisione" id="precisione4" value="4">
                        <label for="precisione4">4</label>
                        <input type="radio" name="precisione" id="precisione5" value="5">
                        <label for="precisione5">5</label>
                        <input type="radio" name="precisione" id="precisione6" value="6">
                        <label for="precisione6">6</label>
                        <input type="radio" name="precisione" id="precisione7" value="7">
                        <label for="precisione7">7</label>
                        <input type="radio" name="precisione" id="precisione8" value="8">
                        <label for="precisione8">8</label>
                        <input type="radio" name="precisione" id="precisione9" value="9">
                        <label for="precisione9">9</label>
                        <input type="radio" name="precisione" id="precisione10" value="10">
                        <label for="precisione10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>

                <div class="rating">
                    <div class="title">
                        <p>7. Creatività *</p>
                        <div class="message"><i>** Questo campo è obbligatorio **</i></div>
                    </div>

                    <div class="radio">
                        <input type="radio" name="creativita" id="creativita0" value="0">
                        <label for="creativita0">0</label>
                        <input type="radio" name="creativita" id="creativita1" value="1">
                        <label for="creativita1">1</label>
                        <input type="radio" name="creativita" id="creativita2" value="2">
                        <label for="creativita2">2</label>
                        <input type="radio" name="creativita" id="creativita3" value="3">
                        <label for="creativita3">3</label>
                        <input type="radio" name="creativita" id="creativita4" value="4">
                        <label for="creativita4">4</label>
                        <input type="radio" name="creativita" id="creativita5" value="5">
                        <label for="creativita5">5</label>
                        <input type="radio" name="creativita" id="creativita6" value="6">
                        <label for="creativita6">6</label>
                        <input type="radio" name="creativita" id="creativita7" value="7">
                        <label for="creativita7">7</label>
                        <input type="radio" name="creativita" id="creativita8" value="8">
                        <label for="creativita8">8</label>
                        <input type="radio" name="creativita" id="creativita9" value="9">
                        <label for="creativita9">9</label>
                        <input type="radio" name="creativita" id="creativita10" value="10">
                        <label for="creativita10">10</label>
                    </div>
                </div>
                <div class="rating-footer">
                    <span>Molto Insoddisfatt*</span>
                    <span>Molto Soddisfatt*</span>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                
            </div>
        </div>

        <!-- Decima domanda -->
        <div class="step-content">
            <div class="fields">
                <p>Quale servizio gratuito (gift service) vorresti? *</p>
                <div class="group gift">
                    <input type="radio" name="servizio_gratuito" id="servizio_gratuito_1" value="Audit del tuo sito">
                    <label for="servizio_gratuito_1">
                        Audit del tuo sito
                    </label>
                    <input type="radio" name="servizio_gratuito" id="servizio_gratuito_2" value="Analisi social media">
                    <label for="servizio_gratuito_2">
                        Analisi social media
                    </label>
                    <input type="radio" name="servizio_gratuito" id="servizio_gratuito_3" value="30 minuti di call per una consulenza">
                    <label for="servizio_gratuito_3">
                        30 minuti di call per una consulenza
                    </label>
                </div>
            </div> 

            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="button" class="btn" onclick="nextPrev(1)">Successivo</button>
                <div class="message"><i>** Questo campo è obbligatorio **</i></div>
            </div>
        </div>

        <!-- Fine -->
        <div class="step-content fine">
            <h2>Le domande sono terminate, grazie ancora per il tuo tempo. 🙏</h2>
            <p>Non ti resta che inviare il form! <br>
                Ti contatteremo a breve per concordare la specifica del tuo gift service.</p>
            
            <div class="buttons">
                <button type="button" class="btn-prev" id="prevBtn" onclick="nextPrev(-1)">Precedente</button>
                <button type="submit" class="btn" onclick="nextPrev(1)">Invia</button>
            </div>

            <div class="last-step-icons">
                <img src="img/emoji/BrandIdentity.png" alt="">
                <img src="img/emoji/Strategia.png" alt="">
                <img src="img/emoji/GraphicDesign.png" alt="">
                <img src="img/emoji/VideoFotografia.png" alt="">
                <img src="img/emoji/Eventi.png" alt="">
                <img src="img/emoji/CopySocial.png" alt="">
                <img src="img/emoji/WebSeo.png" alt="">
                <img src="img/emoji/WebDev2.png" alt="">
                <img src="img/emoji/GraphicDesign2.webp" alt="">
                <img src="img/emoji/max.png" alt="">
            </div>
        </div>

    </form>
    <div id="icons">
        <img id="emoji" src="" alt="">
    </div>
</div>
    
    

    <script src="script.js"></script>
    <?php if (!empty($_POST)): ?>

        <div class="step-content">
            <div class="result"><?=$response?></div>
        </div>
    <?php endif; ?>
</body>
</html>
