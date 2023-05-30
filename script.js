var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
var currentQuestion = 0
let images = ['baobab-strategia-2', 'baobab-strategia-1', 'baobab-graphicDesign-2', 'baobab-video-1', 'baobab-graphicDesign-1', '0646_Z61_4113', '0818_Z61_4536 copia', 'realta-virtuale-cosa-serve', 'baobab-brandIdentity-2', 'baobab-brandIdentity-1'];
let image = document.getElementById('image')
let emojis = ['BrandIdentity', 'Strategia', 'GraphicDesign', 'VideoFotografia', 'Eventi', 'CopySocial', 'WebSeo', 'WebDev2', 'GraphicDesign2', 'max']
let emoji = document.getElementById('emoji')


function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("step-content");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("step-container").style.display = "none";
    document.getElementById('image').style.display = "none";
    document.getElementById('emoji').style.display = "none";
    document.getElementById("stepper-counter").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("step-container").style.display = "flex";
    document.getElementById('image').style.display = "block";
    document.getElementById('emoji').style.display = "block";
    document.getElementById("stepper-counter").style.display = "block";
  }

  if(n == 11){
    document.getElementById('image').style.display = "none";
    document.getElementById('emoji').style.display = "none";
  }

  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("step-content");

  
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
  
  image.src = 'img/' + images[currentTab - 1] + '.png'
  if(currentTab == 9){
    emoji.src = 'img/emoji/' + emojis[currentTab - 1] + '.webp'
  } else{
    emoji.src = 'img/emoji/' + emojis[currentTab - 1] + '.png'

  }

}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("step-content");
  let moreQuestions = document.querySelectorAll('.more-questions .fields .rating');
  let message = x[currentTab].getElementsByClassName("message");
  y = x[currentTab].getElementsByTagName("input");
  let arrayRadio = x[currentTab].querySelectorAll("input[type=radio]");
  radioChecked = x[currentTab].querySelectorAll("input[type=radio]:checked")
  let arrayCheckbox = x[currentTab].querySelectorAll("input[type=checkbox]");
  checked = x[currentTab].querySelectorAll("input[type=checkbox]:checked");
  

  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {

    if (currentTab == 1){
      if (y[i].value == "" || !y[i].value.includes("@")) {
        valid = false;
        addShow(message[0])
      }
    }

    if (arrayRadio.length >= 1 ){   
      if (radioChecked.length == 0) {
        valid = false;
        addShow(message[0])
      } 
    } else if (arrayCheckbox.length >= 1 ) {
        if (checked.length == 0) {
          valid = false;
          addShow(message[0])
        }
    }

    if (currentTab == 9){
      for (j = 0; j < moreQuestions.length; j++) {

        let moreQuestionsRadioChecked = moreQuestions[j].querySelectorAll("input[type=radio]:checked")
        let messageMoreQuestions = moreQuestions[j].getElementsByClassName("message");
        if ((moreQuestionsRadioChecked.length) == 0 ){ 
          valid = false;
          addShowTab10(messageMoreQuestions[0])
        } 
      }

    } 
  }

  if (valid){
    image.src = 'img/' + images[currentTab] + '.png'
  }
  return valid; 
}

function addShow(message) {
  message.classList.add("show")
}
function addShowTab10(message) {
  message.classList.add("show")
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("step");

  for (i = 0; i < x.length; i++) {
    x[n].classList += " active";
    document.getElementById("counter").innerHTML = n
  }
}




/************************************* */
// STILI
/************************************* */

// Smiles 
let icons = document.getElementsByClassName("item-icons")

for (var i = 0; i < icons.length; i++) {
  icons[i].addEventListener("click", function() {
    var selected = document.getElementsByClassName("selected");
    selected[0].className = selected[0].className.replace(" selected", "");
    this.className += " selected";
  });
}

 
// range gestione progetto
let arrayRange = document.getElementById("range_gestione");
let divNumbers = document.getElementById('gestione-progetto').getElementsByTagName('div');

arrayRange.addEventListener("input", function() {

  let colorIt = document.getElementsByClassName("selected-1");
  let colorThisNumber = colorIt.length - 1
  colorIt[colorThisNumber].className = colorIt[colorThisNumber].className.replace(" selected-1", "");
  for (var i = 0; i < divNumbers.length; i++) {
    if (arrayRange.value == parseInt(divNumbers[i].textContent)){
      divNumbers[i].className = " selected-1";
    } 
    if (arrayRange.value != 0){
      divNumbers[0].className = " ";
    }
  }
});

// range punteggio servizio
let arrayRangePunteggio = document.getElementById("range_servizio");
let divNumbersPunteggio = document.getElementById('punteggio').getElementsByTagName('div');

arrayRangePunteggio.addEventListener("input", function() {

  let colorIt = document.getElementsByClassName("selected-2");
  let colorThisNumber = colorIt.length - 1
  colorIt[colorThisNumber].className = colorIt[colorThisNumber].className.replace(" selected-2", "");
  for (var i = 0; i < divNumbersPunteggio.length; i++) {
    if (arrayRangePunteggio.value == parseInt(divNumbersPunteggio[i].textContent)){
      divNumbersPunteggio[i].className = " selected-2";
    } 
    if (arrayRangePunteggio.value != 0){
      divNumbersPunteggio[0].className = " ";
    }
  }
});

// range consiglio
let arrayRangeConsiglio = document.getElementById("consiglio");
let divNumbersConsiglio = document.getElementById('consiglio-rating').getElementsByTagName('div');

arrayRangeConsiglio.addEventListener("input", function() {

  let colorIt = document.getElementsByClassName("selected-3");
  let colorThisNumber = colorIt.length - 1
  colorIt[colorThisNumber].className = colorIt[colorThisNumber].className.replace(" selected-3", "");
  for (var i = 0; i < divNumbersConsiglio.length; i++) {
    if (arrayRangeConsiglio.value == parseInt(divNumbersConsiglio[i].textContent)){
      divNumbersConsiglio[i].className = " selected-3";
    } 
    if (arrayRangeConsiglio.value != 0){
      divNumbersConsiglio[0].className = " ";
    }
  }
});


let groupLabel = document.getElementsByClassName("group-label");
for (let check = 0; check < groupLabel.length; check++) {
  let element = groupLabel[check];
  
  let thisCheckbox = element.getElementsByTagName("input")
  let thisSpan = element.getElementsByTagName("span")
  thisCheckbox.checked = false

  thisSpan[0].addEventListener('click', () => {
    thisCheckbox.checked = !thisCheckbox.checked
    
    if (thisCheckbox.checked){
      element.classList.add('selected')
    } else{
      element.classList.remove('selected')
    } 
  })
}

let groupLabel2 = document.querySelectorAll(".group-label-2");
for (let check2 = 0; check2 < groupLabel2.length; check2++) {
  let element = groupLabel2[check2];
  
  let thisCheckbox = element.getElementsByTagName("input")
  let thisSpan = element.getElementsByTagName("span")
  thisCheckbox.checked = false

  thisSpan[0].addEventListener('click', () => {
    thisCheckbox.checked = !thisCheckbox.checked
    
    if (thisCheckbox.checked){
      element.classList.add('selected')
    } else{
      element.classList.remove('selected')
    } 
  })
}

