$(document).ready(function () {
     

  var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  var today  = new Date();
    $('#tglreservasi').val(today.toLocaleDateString("id-ID", options));

  
  
    const previousButton = document.querySelector('#prev')
    const nextButton = document.querySelector('#next')
    const submitButton = document.querySelector('#submit')
    const tabTargets = document.querySelectorAll('.tab')
    const tabPanels = document.querySelectorAll('.tabpanel')
    const bpjsButton = document.querySelector('#debitur1')
    const isEmpty = (str) => !str.trim().length
    let currentStep = 0

    // Validate first input on load
    validateEntry()

    // Next: Change UI relative to current step and account for button permissions
    nextButton.addEventListener('click', (event) => {
      event.preventDefault()

      var kartu = $('#sistembayar').val();
      if (!kartu) {
        alert('Pilih metode pembayaran');
      } else {
        document.getElementById('uploadasuransi').style.display = 'none';
        document.getElementById('uploadasuransi').style.opacity = '0';
        document.getElementById('uploadasuransi').style.transition = "all 30s";
        document.getElementById('uploadbpjs').style.display = 'none';
        document.getElementById('uploadbpjs').style.opacity = '0';
        document.getElementById('uploadbpjs').style.transition = "all 30s";  
  
        // Hide current tab
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')
  
        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      }

    })

    // Previous: Change UI relative to current step and account for button permissions
    previousButton.addEventListener('click', (event) => {
      event.preventDefault()

      // Hide current tab
      tabPanels[currentStep].classList.add('hidden')
      tabTargets[currentStep].classList.remove('active')

      // Show previous tab
      tabPanels[currentStep - 1].classList.remove('hidden')
      tabTargets[currentStep - 1].classList.add('active')
      currentStep -= 1

      nextButton.removeAttribute('disabled')
      updateStatusDisplay()
    })

    // BPJS:
    // bpjsButton.addEventListener('click', (event) => {
    //   event.preventDefault()

    //   // Hide current tab
    //   tabPanels[currentStep].classList.add('hidden')
    //   tabTargets[currentStep].classList.remove('active')

    //   // Show next tab
    //   tabPanels[currentStep + 1].classList.remove('hidden')
    //   tabTargets[currentStep + 1].classList.add('active')
    //   currentStep += 1
      
    //   uploadbpjs()
    //   updateStatusDisplay()
    // })


    function updateStatusDisplay() {
      // If on the last step, hide the next button and show submit
      if (currentStep === tabTargets.length - 1) {
        nextButton.classList.add('hidden')
        previousButton.classList.remove('hidden')
        submitButton.classList.remove('hidden')
        validateEntry()

        // If it's the first step hide the previous button
      } else if (currentStep == 0) {
        var sisbar = $('#sistembayar').val();
      if (sisbar == "BPJS") {
        document.getElementById('uploadbpjs').style.display = 'block';
        document.getElementById('uploadbpjs').style.opacity = '1';
        document.getElementById('uploadbpjs').style.transition = "all 30s";
      } else if (sisbar == "asuransi") {
        document.getElementById('uploadasuransi').style.display = 'block';
        document.getElementById('uploadasuransi').style.opacity = '1';
        document.getElementById('uploadasuransi').style.transition = "all 30s";
      } 
        nextButton.classList.remove('hidden')
        previousButton.classList.add('hidden')
        submitButton.classList.add('hidden')
        // In all other instances display both buttons
      } else {
        nextButton.classList.remove('hidden')
        previousButton.classList.remove('hidden')
        submitButton.classList.add('hidden')
      }
    }

    function validateEntry() {
      let input = tabPanels[currentStep].querySelector('.form-input')
      
      // Start but disabling continue button
      nextButton.setAttribute('disabled', true)
      submitButton.setAttribute('disabled', true)
      
      // Validate on initial function fire
      setButtonPermissions(input)
      
      // Validate on input
      input.addEventListener('input', () => setButtonPermissions(input))
      // Validate if bluring from input
      input.addEventListener('blur', () => setButtonPermissions(input))
    }

    function setButtonPermissions(input) {
      if (isEmpty(input.value)) {
        nextButton.setAttribute('disabled', true)
        submitButton.setAttribute('disabled', true)
      } else {
        nextButton.removeAttribute('disabled')
        submitButton.removeAttribute('disabled')
      }
    }

    // function uploadbpjs() {
      
    // }

   

      $(':radio[id=debitur1]').change(function(){

        let debitur = $(':radio[id=debitur1]').val();
        $('#sistembayar').val(debitur);

        document.getElementById('uploadbpjs').style.display = 'block';
        document.getElementById('uploadbpjs').style.opacity = '1';
        document.getElementById('uploadbpjs').style.transition = "all 30s";
        document.getElementById('uploadasuransi').style.display = 'none';
        document.getElementById('uploadasuransi').style.opacity = '0';
        document.getElementById('uploadasuransi').style.transition = "all 30s";
      });
      $(':radio[id=debitur2]').change(function(){

        let debitur = $(':radio[id=debitur2]').val();
        $('#sistembayar').val(debitur);

        document.getElementById('uploadasuransi').style.display = 'block';
        document.getElementById('uploadasuransi').style.opacity = '1';
        document.getElementById('uploadasuransi').style.transition = "all 30s";
        document.getElementById('uploadbpjs').style.display = 'none';
        document.getElementById('uploadbpjs').style.opacity = '0';
        document.getElementById('uploadbpjs').style.transition = "all 30s";
      });
      $(':radio[id=debitur3]').change(function(){

        let debitur = $(':radio[id=debitur3]').val();
        $('#sistembayar').val(debitur);
        $('#gambarasuransi').val("");
        $('#gambarbpjs').val("");

        document.getElementById('uploadasuransi').style.display = 'none';
        document.getElementById('uploadasuransi').style.opacity = '0';
        document.getElementById('uploadasuransi').style.transition = "all 30s";
        document.getElementById('uploadbpjs').style.display = 'none';
        document.getElementById('uploadbpjs').style.opacity = '0';
        document.getElementById('uploadbpjs').style.transition = "all 30s";      

        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });

      $(':radio[id=pagi1]').change(function(){

        let dokter = $(':radio[id=pagi1]').val();
       
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      $(':radio[id=pagi2]').change(function(){

        let dokter = $(':radio[id=pagi2]').val();
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      $(':radio[id=pagi3]').change(function(){

        let dokter = $(':radio[id=pagi3]').val();
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      $(':radio[id=sore1]').change(function(){

        let dokter = $(':radio[id=sore1]').val();
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      $(':radio[id=sore2]').change(function(){

        let dokter = $(':radio[id=sore2]').val();
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      $(':radio[id=sore3]').change(function(){

        let dokter = $(':radio[id=sore3]').val();
        // $('#dokter').val(dokter);
        tabPanels[currentStep].classList.add('hidden')
        tabTargets[currentStep].classList.remove('active')

        // Show next tab
        tabPanels[currentStep + 1].classList.remove('hidden')
        tabTargets[currentStep + 1].classList.add('active')
        currentStep += 1
        
        validateEntry()
        updateStatusDisplay()
      });
      
      // $('.dokter').click(function () { 
      //   let dokter = $('.dokter').val();
      //   console.log(dokter);
        
      // });



      $('#simpanbpjs').click(function () { 
        document.getElementById('uploadbpjs').style.display = 'none';
        document.getElementById('uploadbpjs').style.opacity = '0';
        document.getElementById('uploadbpjs').style.transition = "all 30s"; 

        alert('Data berhasil tersimpan');
        let gambar = $('#gambarbpjs').val();
        $('#kartu').val(gambar);
        $('#gambarasuransi').val("");

      tabPanels[currentStep].classList.add('hidden')
      tabTargets[currentStep].classList.remove('active')

      // Show next tab
      tabPanels[currentStep + 1].classList.remove('hidden')
      tabTargets[currentStep + 1].classList.add('active')
      currentStep += 1
      
      validateEntry()
      updateStatusDisplay()
      });

      $('#simpanasuransi').click(function () { 
        document.getElementById('uploadasuransi').style.display = 'none';
        document.getElementById('uploadasuransi').style.opacity = '0';
        document.getElementById('uploadasuransi').style.transition = "all 30s";

        alert('Data berhasil tersimpan');
          let gambar = $('#gambarasuransi').val();
          $('#kartu').val(gambar);
          $('#gambarbpjs').val("");

        tabPanels[currentStep].classList.add('hidden')
      tabTargets[currentStep].classList.remove('active')

      // Show next tab
      tabPanels[currentStep + 1].classList.remove('hidden')
      tabTargets[currentStep + 1].classList.add('active')
      currentStep += 1
      
      validateEntry()
      updateStatusDisplay()
      });



});