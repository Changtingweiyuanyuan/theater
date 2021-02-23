<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap');
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: 'Poppins', sans-serif;
    }
    header{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        display:flex;
        justify-content: space-between;
        align-items: center;
        padding:40px 100px;
        z-index:1;
    }
    header .logo{
        max-width:120px;
    }
    header .toggle{
        max-width:60px;
        cursor:pointer;
    }
    .banner{
        position: relative;
        width: 100%;
        min-height:100vh;
        padding:0 100px;
        background: url(img/joker-mask-off-xw.jpg);
        background-size:cover;
        display:flex;
        justify-content: flex-start;
        align-items: center;
    }
    .banner .content{
        max-width: 550px;
    }
    .banner .content h2{
        text-transform: uppercase;
        font-weight: 400;
        font-size: 2.5em;
        letter-spacing: 0.1em;
        color:#fff;
    }
    .banner .content p{
        font-weight: 300;
        font-size: 1.2em;
        letter-spacing: 0.02em;
        color:#fff;
        margin:15px 0 35px;
    }
    .play{
        position:relative;
        display: inline-flex;
        justify-content: flex-start;
        align-items: center;
        color: #fff;
        text-transform: uppercase;
        font-weight: 500;
    }
</style>
<header>
    <a href="#" class="logo">JOKER</a>
    <div class="toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-distribute-vertical" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 1.5a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5zm0 13a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5z" />
            <path d="M2 7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7z" />
        </svg>
    </div>
</header>
<banner>
    <content>
        <h2>Lorem, ips consectetur racta.</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti ipsa velit quidem tempora exercitationem nobis maiores sed expedita consectetur, perspiciatis earum iusto ut, officiis dolores repellendus nemo aspernatur quibusdam hic.</p>
        <a href="#" class="play">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z" />
            </svg>
        </a>
    </content>
</banner>