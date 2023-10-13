<!DOCTYPE html>
<html>
<head>
    <title>Employee</title>
    <style>.button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body><div style="text-align: center">

    <h4>Hi {{$employee['first_name']}}</h4>
    <h2>{{$title}}<br></h2>
    <h5> Your Account Details </h5>
    @if(array_key_exists('first_name',$employee))
         <p> Name: {{ $employee['first_name']}} </p>
        @if(array_key_exists('employee_id',$employee))
            <p> Employee id: {{ $employee['employee_id']}} </p>
            @if(array_key_exists('email',$employee))
                <p> Email: {{ $employee['email']}} </p>
            @endif
        @endif
    @endif


    <a href="{{route('forgotpassword.employee')}}" type="button" class="button">Set Password</a>
</div>
</body>
</html>

