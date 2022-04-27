@component('mail::message')
    <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px" align="center" class="mdv2rw">
        <div style="font-family:'Google Sans',Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word"><div style="font-size:24px">
                Дорогой, {{$order}}, подтвердите адрес электронной почты
        </div>
    </div>
    <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">Компания  получила запрос на использование адреса электронной почты <a style="font-weight:bold">{{$email}}</a> .<br><br>Используйте этот код, чтобы завершить настройку резервного адреса электронной почты:<br>
        <div style="text-align:center;font-size:36px;margin-top:20px;line-height:44px">
            {{$code}}
        </div>
        <br>Срок действия кода истечет через 24 часа.
        </div>
    </div>


@endcomponent
