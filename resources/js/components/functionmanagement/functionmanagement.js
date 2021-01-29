import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Function_Management extends Component {

    constructor(props) {

        super(props);

        this.state = {
            users: [],
            managements: [],
            messages: [],
            modalIsOpen: false,
            modal_name: '',
            talkname: '',
            talk_id: '',
            value: ''

        };


        this.convert = this.convert.bind(this);

    }

    convert(e) {

        axios
            .post('http://localhost:8000/api/tool', {
                value: e.target.value,
                authuserid: auth_user.id,

            })
            .then(res => {
            })
            .catch(error => {
                alert("登録失敗");
                // console.log(error, data);
            });
    }

    componentDidMount(){

        let taskvalue = document.getElementById('task');
        let talkvalue = document.getElementById('talk');
        let notevalue = document.getElementById('note');
        let filevalue = document.getElementById('file');
        let reportvalue = document.getElementById('report');


        if(usertool[0].task == 1){
            taskvalue.style.backgroundColor = "#F36B6B";
            taskvalue.innerHTML = '<i class="fas fa-minus"></i>無効にする';
        }else {
            taskvalue.style.backgroundColor = "4B8999";
            taskvalue.innerHTML = '<i class="fas fa-plus"></i>有効にする';
        }

        if(usertool[0].talk == 1){
            talkvalue.style.backgroundColor = "#F36B6B";
            talkvalue.innerHTML = '<i class="fas fa-minus"></i>無効にする';
        }else {
            talkvalue.style.backgroundColor = "4B8999";
            talkvalue.innerHTML = '<i class="fas fa-plus"></i>有効にする';
        }

        if(usertool[0].note == 1){
            notevalue.style.backgroundColor = "#F36B6B";
            notevalue.innerHTML = '<i class="fas fa-minus"></i>無効にする';
        }else {
            notevalue.style.backgroundColor = "4B8999";
            notevalue.innerHTML = '<i class="fas fa-plus"></i>有効にする';
        }

        if(usertool[0].file == 1){
            filevalue.style.backgroundColor = "#F36B6B";
            filevalue.innerHTML = '<i class="fas fa-minus"></i>無効にする';
        }else {
            filevalue.style.backgroundColor = "4B8999";
            filevalue.innerHTML = '<i class="fas fa-plus"></i>有効にする';
        }

        if(usertool[0].report == 1){
            reportvalue.style.backgroundColor = "#F36B6B";
            reportvalue.innerHTML = '<i class="fas fa-minus"></i>無効にする';
        }else {
            reportvalue.style.backgroundColor = "4B8999";
            reportvalue.innerHTML = '<i class="fas fa-plus"></i>有効にする';

        }
    }

    render() {

        return (

            <div className="main-menu">
                <div className="main-contents">
                    <div className="my-header">
                        <h2>機能管理</h2>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">

                        </section>

                    </div>
                    <div className="main-item">
                        <div className="function-management">
                            <table border="0" >
                                <tr className="tr-des">
                                    <td><i className="fas fa-tasks"></i>　タスク管理機能</td>
                                    <td><button type="submit" name="action" id="task" value="task" onClick={this.convert}>　<i class="fas fa-plus"></i>無効にする　</button></td>
                                </tr>
                                <tr>
                                    <td><i className="far fa-comment-alt"></i>　トーク機能</td>
                                    <td><button type="submit" name="action" id="talk" value="talk" onClick={this.convert}>　<i class="fas fa-plus"></i>無効にする　</button></td>
                                </tr>
                                <tr>
                                    <td><i className="fas fa-book-open"></i>　ノート機能</td>
                                    <td><button type="submit" name="action" id="note" value="note" onClick={this.convert}>　<i class="fas fa-plus"></i>無効にする　</button></td>
                                </tr>
                                <tr>
                                    <td><i className="far fa-folder"></i>　ファイル共有機能</td>
                                    <td><button type="submit" name="action" id="file" value="file" onClick={this.convert}>　<i class="fas fa-plus"></i>無効にする　</button></td>
                                </tr>
                                <tr>
                                    <td><i className="fas fa-book"></i>　レポート機能</td>
                                    <td><button type="submit" name="action" id="report" value="report" onClick={this.convert}>　<i class="fas fa-plus"></i>無効にする　</button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('function_management')) {
    ReactDOM.render(<Function_Management />, document.getElementById('function_management'));
}