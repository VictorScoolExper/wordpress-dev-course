document.addEventListener('DOMContentLoaded', ()=>{ //notifies when DOM is loaded
    const openModalBtn = document.querySelectorAll('.open-modal');
    const modalEl = document.querySelector(
        '.wp-block-udemy-plus-auth-modal'
    );

    const modalCloseEl = document.querySelectorAll( // get all with the following match
        '.modal-overlay, .modal-btn-close'// you can add several
    );

    openModalBtn.forEach( el => { //cycles to find the clicked element
        el.addEventListener('click', event => {
            event.preventDefault();

            modalEl.classList.add('modal-show'); //changes css style
        })
    });

    modalCloseEl.forEach(el => {
        el.addEventListener('click', event => {
            event.preventDefault();

            modalEl.classList.remove('modal-show'); //removes
        })
    })

    const tabs = document.querySelectorAll('.tabs a');
    const signinForm = document.querySelector('#signin-tab');
    const signupForm = document.querySelector('#signup-tab');

    tabs.forEach(tab => {
        tab.addEventListener('click', event =>{
            event.preventDefault();

            tabs.forEach(currentTab =>{
                currentTab.classList.remove('active-tab');
            });

            // console.log(event.currentTarget); 
            event.currentTarget.classList.add('active-tab');


            const activeTab = event.currentTarget.getAttribute('href');

            if(activeTab === '#signin-tab'){
                signinForm.style.display = 'block';
                signupForm.style.display = 'none';
            } else {
                signinForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
        });
    });

    signupForm.addEventListener('submit', event => {
        event.preventDefault();
        
        const signupFieldset = signupForm.querySelector('fieldset');
        signupFieldset.setAttribute('disabled', true);

        const signupStatus = signupForm.querySelector('#signup-status');
        signupStatus.innerHTML = `
            <div class="modal-status modal-status-info">
                Please wait! We are creating your account
            </div>
        `
    })

});

