<div class="preloder" id="preloder">
    <div class="wrapper">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
        <div class="shadow"></div>
    </div>
    <div class="text ms-lg-5 ms-md-4 ps-lg-5 ps-0 ms-0 me-4mt-0">
        <label for="" class="fs-3 ">NEVI'S</label>
    </div>

</div>

<style>
    .preloder {
        position: fixed;
        /* background: radial-gradient(#ffffff, #ebebeb); */
        background-color: white;
        height: 100vh;
        width: 100%;
        z-index: 99999999;
        padding: 0;
        top: 0;
        left: 0;
        right: 0;
        /* opacity: 0.9; */
    }

    .wrapper {
        width: 200px;
        height: 60px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .text {
        width: 200px;
        height: 60px;
        position: absolute;
        left: 42%;
        top: 63%;
        font-weight: bold;
        font-size: 22px;

        /* transform: translate(-50%, -50%);  */
    }

    .circle {
        width: 20px;
        height: 20px;
        position: absolute;
        border-radius: 50%;
        background-color: #000000;
        left: 15%;
        /* top: 10%; */
        transform-origin: 50%;
        animation: circle .5s alternate infinite ease;
    }

    @keyframes circle {
        0% {
            top: 60px;
            height: 5px;
            border-radius: 50px 50px 25px 25px;
            transform: scaleX(1.7);
        }

        40% {
            height: 20px;
            border-radius: 50%;
            transform: scaleX(1);
        }

        100% {
            top: 0%;
        }
    }

    .circle:nth-child(2) {
        left: 45%;
        animation-delay: .2s;
    }

    .circle:nth-child(3) {
        left: auto;
        right: 15%;
        animation-delay: .3s;
    }

    .shadow {
        width: 20px;
        height: 4px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, .5);
        position: absolute;
        top: 62px;
        transform-origin: 50%;
        z-index: -1;
        left: 15%;
        filter: blur(1px);
        animation: shadow .5s alternate infinite ease;
    }

    @keyframes shadow {
        0% {
            transform: scaleX(1.5);
        }

        40% {
            transform: scaleX(1);
            opacity: .7;
        }

        100% {
            transform: scaleX(.2);
            opacity: .4;
        }
    }

    .shadow:nth-child(4) {
        left: 45%;
        animation-delay: .2s
    }

    .shadow:nth-child(5) {
        left: auto;
        right: 15%;
        animation-delay: .3s;
    }

    .wrapper div {
        position: absolute;
        top: 80px;
        font-family: 'Lato';
        font-size: 20px;
        letter-spacing: 12px;
        color: #000000;
        left: 15%;
    }

    .div {
        font-family: 'Calibri';
        font-size: 18px;
        color: orange;
        left: 15%;
        font-weight: 900;
        text-align: center;
        margin-top: 21rem;
    }
</style>

<script>
    var preloder = document.getElementById("preloder");

    // window.addEventListener("load", function() {
    //     loder.style.display = "none";
    //     loder.fadeOut("slow")
    // });

    $(window).on("load", function() {
        $("#preloder").fadeOut("slow", function() {
            $("#content").fadeIn("slow");
        });
    });
</script>