<style>
    /* banner */
    .banner {
        background-color: white;
        color: #00A652;
    }
    .banner_img {
        width: 6rem;
    }
    /* heading */
    .heading {
        margin-bottom: 2rem;
    }
    /* navbar */
    .navbar {
        background-color: #94ccac;
        font-size: 1rem;
        box-shadow:
            4.1px 2.8px 5.3px rgba(0, 0, 0, 0.044),
            13.8px 9.4px 17.9px rgba(0, 0, 0, 0.066),
            62px 42px 80px rgba(0, 0, 0, 0.11)
            ;
    }
    .navbar li {
        padding: 0.1em 2em;
        
    }
    .navbar li:hover {
        background-color: #71AF97;
    }
    .navbar li a{
        font-weight: bold;
        
    }
    .navbar_active {
        background-color: #71AF97;
    }
</style>

<div class="heading">
    <div class="banner d-flex p-4">
        <div class="mx-5">
            <img src="{{asset('images/DICA.jpg')}}" alt="" class="banner_img">
        </div>
        <div class="banner_txt mx-4">
            <h4>Ministry of Investment and Foreign Economic Relations</h4>
            <h6>Directorate of Investment and Company Administration</h6>
            <h6 style="color: rgb(104, 104, 104);">Office Letter Record System</h6>
        </div>
    </div>
    <nav class="navbar navbar-expand navbar-light p-0">
        <div class="container-fluid d-flex ms-5">  
            <ul class="navbar-nav">
                <li class="nav-item @if($now === 'inbox') navbar_active @else notactive @endif">
                    <a class="nav-link" href="#" >Inbox</a>
                </li>
                <li class="nav-item  @if($now === 'outbox') navbar_active @else notactive @endif">
                    <a class="nav-link" href="#" >Outbox</a>
                </li>
                <li class="nav-item  @if($now === 'document') navbar_active @else notactive @endif">
                    <a class="nav-link" href="#" >Document</a>
                </li>
                <li class="nav-item @if($now === 'search') navbar_active @else notactive @endif">
                    <a class="nav-link" href="#" >Search</a>
                </li>
            </ul>
        </div>
    </nav>
</div>