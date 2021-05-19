@csrf
    
    <p>
    <label>氏名<br>
    <input type="text" name="name"
           value="{{old('name')}}"></label>
    </p>
    <p>
    <label>チェックイン日<br>
    <input type="date" name="check_in"
           value="{{old('check_in')}}"></label>
    </p>
    <p>
    <label>チェックアウト日<br>
    <input type="date" name="check_out"
           value="{{old('check_out')}}"></label>
    </p>
