@extends('layout.app')

<style>
    .compose_table tr td {
        padding: 2em 1em;
    }
    .error_mssg {
        font-weight: bold;
        color: #ff1322;
    }
</style>

@section('content')
    <div style="width: 95%; margin:auto;">
        <form action="@if($datas){{route('inbox.compose.update', $datas['id'])}}@else{{route('inbox.compose.store')}}@endif" method="post">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
            @csrf
            <table class="table align-middle compose_table" style="text-align: right;font-size: 0.8rem;">
                <tbody>
                    <tr>
                        <td>
                            ဌာန
                        </td>
                        <td style="text-align: center;">
                            ဗဟိုစာပေးစာယူဌာန
                        </td>
                        <td>
                            စာအမှတ်ရက်စွဲ
                        </td>
                        <td>
                            <input type="date" class="form-control" name="letter_date" value="@if($datas){{$datas['letter_date']}}@endif">
                            @error("letter_date")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ခေါင်းစဥ်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="title" value="@if($datas){{$datas['letter_type_id']}}@endif">
                            @error("title")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            မည်သူ့ထံမှ
                        </td>
                        <td>
                            <input type="text" class="form-control" name="received_form_or_sent_to" value="@if($datas){{$datas['received_form_or_sent_to']}}@endif">
                            @error("received_form_or_sent_to")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                            <input type="hidden" name="letter_type_id" value="1">
                        </td>
                        <td>
                            စာအမှတ်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="letter_no" value="@if($datas){{$datas['letter_no']}}@endif">
                            @error("letter_num")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            စာအမှတ်စဥ်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="ledger_Sno" value="@if($datas){{$datas['ledger_Sno']}}@endif">
                            @error("ledger_Sno")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td colspan="2">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            အကြောင်းအရာ
                        </td>
                        <td colspan="5">
                            <div class="">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">@if($datas){{$datas['description']}}@endif</textarea>
                                @error("description")
                                    <div class="error_mssg">{{ $message }}</div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ပေးပို့သည့်နေ့ <br>(ညွှန်ချုပ်ဆီသို့)
                        </td>
                        <td>
                            <input type="date" class="form-control" name="dg_up" value="@if($datas){{$datas['dg_up']}}@endif">
                            @error("dg_up")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ပြန်ကျသည့်နေ့ <br>(ညွှန်ချုပ်ဆီမှ)
                        </td>
                        <td>
                            <input type="date" class="form-control" name="dg_down" value="@if($datas){{$datas['dg_down']}}@endif">
                            @error("dg_down")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ညွှန်ချုပ်မှတ်ချက်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="dg_remark" value="@if($datas){{$datas['dg_remark']}}@endif">
                            @error("dg_remark")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ပေးပို့သည့်နေ့ <br>(ဒုညွှန်ချုပ်ဆီသို့)
                        </td>
                        <td>
                            <input type="date" class="form-control"  name="ddg_up" value="@if($datas){{$datas['ddg_up']}}@endif">
                            @error("ddg_up")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ပြန်ကျသည့်နေ့ <br>(ဒုညွှန်ချုပ်ဆီမှ)
                        </td>
                        <td>
                            <input type="date" class="form-control" name="ddg_down" value="@if($datas){{$datas['ddg_down']}}@endif">
                            @error("ddg_down")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ဒုညွှန်ချုပ်မှတ်ချက်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="ddg_remark" value="@if($datas){{$datas['ddg_remark']}}@endif">
                            @error("ddg_remark")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ပေးပို့သည့်နေ့ <br>(ညွှန်မှုးဆီသို့)
                        </td>
                        <td>
                            <input type="date" class="form-control" name="d_up" value="@if($datas){{$datas['d_up']}}@endif">
                            @error("d_up")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ပြန်ကျသည့်နေ့ <br>(ညွှန်မှုးဆီမှ)
                        </td>
                        <td>
                            <input type="date" class="form-control" name="d_down" value="@if($datas){{$datas['d_down']}}@endif">
                            @error("d_down")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            ညွှန်မှုးမှတ်ချက်
                        </td>
                        <td>
                            <input type="text" class="form-control" name="d_remark" value="@if($datas){{$datas['d_remark']}}@endif">
                            @error("d_remark")
                                <div class="error_mssg">{{ $message }}</div>
                            @enderror
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="5">

                        </td>
                        <td>
                            <input type="submit" class="btn btn-success" value="တင်သွင်းမည်">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection