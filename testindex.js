const txtAnim = document.getElementById('titre')

new Typewriter(txtAnim,{
    loop: false,
    deleteSpeed : 20
})
.changeDelay(20)
.typeString('Welcome to...')
.pauseFor(1000)
.deleteAll()
.typeString('<strong> My.Beaucuz </strong>')
.pauseFor(1000)

.start()