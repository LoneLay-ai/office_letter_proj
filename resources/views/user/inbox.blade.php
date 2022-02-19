@extends('layout.app')



<style>
    .inbox_table tr td {
        padding: 1em 0;
    }
</style>

@section('content')
@if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
        <button type="button" class="btn btn-success">၀င်စာထည့်သွင်းရန်</button>

        <div style="width: 95%; margin:auto;">
            
            <table class="table inbox_table align-middle" style="text-align: center;">
                <thead>
                    <tr>
                        <th scope="col" >စဥ်</th>
                        <th scope="col">လက်ခံရရှိသည့်နေ့</th>
                        <th scope="col">မည်သူ့ထံမှ</th>
                        <th scope="col">စာအမှတ်</th>
                        <th scope="col">ရက်စွဲ</th>
                        <th scope="col">အကြောင်းအရာ</th>
                        <th scope="col">အသေးစိတ်ကြည့်ရှုရန်</th>
                    </tr>
                </thead>
                <tbody class="inbox_tbody">
                    
                </tbody>
                </table>
        </div>
        
        <div class="del_modal">

        </div>

        
@endsection

@section('scripts')

<script>

    
    let del_modal = document.querySelector('.del_modal');
    const add_modal = (id) => {
        return `
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="del_modal_child()"></button>
                </div>
                <div class="modal-body">
                    <h2>
                        Hey this is modal 
                    </h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="del_modal_child()">Close</button>
                    <form action="/inbox/delete" method="post">
                        @csrf
                        <input type="submit" class="btn btn-primary save" data-bs-dismiss="modal"></input>
                        <input type="hidden" name="id" value="${id}" onclick="del_modal_child()">
                    </form>
                </div>
                </div>
            </div>
        </div>
        `
    }

    // Add  Model to Dom function
    function show(id) {
        del_modal.innerHTML += add_modal(id)
    }

    // Delete Model function
    function del_modal_child() {
        del_modal.removeChild(document.querySelector(".modal"));
    }

    const getData = async () => {
        const response = await fetch('/inbox/getdata');
        const datas = await response.json();
        console.log(datas);
        let j = 0;
        const inbox_tbody = document.querySelector('.inbox_tbody');
        for (let i = 0; i < datas.letters.length; i++) {
            console.log(datas.letters[i]["received_form_or_sent_to"]);
            inbox_tbody.innerHTML += `
                <tr>
                    <td>${++j}</td>
                    <td>${datas.letters[i]["ledger_date"]}</td>
                    <td>${datas.letters[i]["received_form_or_sent_to"]}</td>
                    <td>${datas.letters[i]["letter_no"]}</td>
                    <td>${datas.letters[i]["letter_date"]}</td>
                    <td>${datas.letters[i]["description"]}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-success btn-sm" onclick="show(${datas.letters[i]['id']})" style="border-radius: 50%; padding: 0.5em;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a>
                                        <form action="/inbox/edit" method="post" class="mb-0">
                                            @csrf
                                            <input type="submit" value="Edit" class="dropdown-item">
                                            <input type="hidden" name="id" value="${datas.letters[i]["id"]}">  
                                        </form>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <form action="/inbox/delete" method="post" class="mb-0">
                                            @csrf
                                            <input type="submit" value="Details" class="dropdown-item">
                                            <input type="hidden" name="id" value="${datas.letters[i]["id"]}">  
                                        </form>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a>
                                        <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-weight:bold; color:red;">
                                            Delete
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            `;
        }
    }
    getData();
</script>

@endsection