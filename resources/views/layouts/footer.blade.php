@section('footer')
<nav>
    <div class="footer-wrapper">
        <div>
            <a href="{{url('/document')}}">
                <i class="fas fa-home"></i>
                </br>ホーム
            </a>
        </div>
        <div class="footer-second">
            <a href="{{url('/document/index')}}">
                <i class="fas fa-folder"></i>
                </br>見る
            </a>
        </div>
        <div>
            <a href="">
                <i class="fas fa-share"></i>
                </br>共有
            </a>
        </div>
    </div>
</nav>
@endsection