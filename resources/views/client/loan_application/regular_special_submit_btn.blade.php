<div class="line"></div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            @auth
                <button class="submit_btn" type="submit">SUBMIT APPLICATION</button>
            @endauth

            @guest
                <button class="submit_btn" type="button" onclick="location.href='/login'">SUBMIT APPLICATION</button>
            @endguest
        </div>
        <div class="col-lg-4"></div>
    </div>
