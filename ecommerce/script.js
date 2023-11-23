const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 2500,
    delay: 400
})
// sr.reveal(`#header img`, {origin: 'top'})
sr.reveal(`h4`, {delay: 200});
sr.reveal(`h2`, {delay: 500});
sr.reveal(`h1`, {delay: 600});
sr.reveal(`p`, {delay: 800});
sr.reveal(`button`, {delay: 1000, origin: 'bottom'});
sr.reveal(`.fe-box`, {origin: 'top'});
sr.reveal(`.pro`, {opacity: 0.2})
sr.reveal(`.banner-box`, {origin: 'left'});
sr.reveal(`.banner-box2`, {origin: 'right'});


// const a = document.querySelectorAll('a')

// a.forEach(element => {
//     element.addEventListener('click', () => {
//         a.forEach(phantu => {
//             phantu.classList.remove('active');
//         })
//         element.classList.add('active');
//     })
// })


const pro = document.querySelectorAll('.pro');

pro.forEach(element => {
    element.addEventListener('click', () => {
        
    })
})
