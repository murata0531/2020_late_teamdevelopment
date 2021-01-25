// import React from 'react';
// import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';
import axios from 'axios';

Modal.setAppElement("#app");

const authuser_id = auth_user_id;
const authuser_name = auth_user_name;
const authuser_icon = auth_user_icon;
const authcompanyid = company_id;

export default class Talk extends Component {



    constructor(props) {

        super(props);

        this.state = {
            users: [],
            managements: [],
            messages: [],
            modalIsOpen: false,
            modal_name: '',
            talkname: '',
            talk_id:'',
            value:''

        };


        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
        this.modalNameChange = this.modalNameChange.bind(this);
        this.radioClick = this.radioClick.bind(this);
        this.modalClick = this.modalClick.bind(this);
        this.messageClick = this.messageClick.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.sendClick = this.sendClick.bind(this);

    }

    openModal() {
        this.setState({ modalIsOpen: true });
    }

    afterOpenModal() {
        // references are now sync'd and can be accessed.
        this.subtitle.style.color = '#f00';
        const selectedroom = document.getElementById('selectedroom');
        selectedroom.style.display = "none";
    }

    closeModal() {
        this.setState({ modalIsOpen: false });
    }

    modalNameChange(e) {

        this.setState({ modal_name: e.target.value });

    }

    radioClick() {

        const check = document.getElementById('modal-form').talktype;

        const selectedprivate = document.getElementById('selectedprivate');
        const selectedroom = document.getElementById('selectedroom');

        if (check.value == 'private') {
            selectedprivate.style.display = "";
            selectedroom.style.display = "none";
        } else {
            selectedprivate.style.display = "none";
            selectedroom.style.display = "";
        }
    }

    modalClick() {
        const check = document.getElementById('modal-form').talktype;
        const selectedprivate = document.getElementById('selectedprivate');
        const selectedroom = document.getElementById('selectedroom');
        const modal_vali1 = document.getElementById('modal-vali1');
        const modal_vali2 = document.getElementById('modal-vali2');
        let modal_name_invalid = document.getElementById('modal-name-invalid');

        if (this.state.modal_name == '') {
            modal_name_invalid.textContent = "トーク名が設定されていません";
            modal_name_invalid.color = "red";
        }
        else if (check.value == 'private') {

            modal_name_invalid.textContent = "";

            if (selectedprivate.value == "" || selectedprivate.value == 'undifined') {
                modal_vali1.textContent = "追加したいメンバーを選んでください";

            } else {
                axios
                    .post('http://localhost:8000/api/adduser', {
                        adduser: selectedprivate.value,
                        authuserid: authuser_id,
                        talkname: this.state.modal_name

                    })
                    .then(res => {
                        alert("登録が完了しました");
                    })
                    .catch(error => {
                        alert("登録失敗");
                        console.log(error, data);
                    });
            }
        } else {
            modal_name_invalid.textContent = "";

            if (selectedroom.value.length <= 0 || selectedroom == 'undifined') {
                modal_vali2.textContent = "追加したいメンバーを選んでください";
            } else {

                const array = [];

                for (let i = 0; i < selectedroom.length; i++) {
                    if (selectedroom[i].selected) {
                        array.push(selectedroom[i].value)
                    }
                }

                axios
                    .post('http://localhost:8000/api/addusers', {
                        addusers: array,
                        authuserid: authuser_id,
                        talkname: this.state.modal_name
                    })
                    .then(res => {
                        alert("登録が完了しました");
                    })
                    .catch(error => {
                        alert("登録失敗");
                        console.log(error, data);
                    });
                modal_vali2.textContent = "";

            }
        }

    }

    messageClick(e) {

        this.setState({ talkname: e.target.name });

        axios.get('http://localhost:8000/api/message', {
            params: {
                // ここにクエリパラメータを指定する
                authid: authuser_id,
                talkid: e.target.id
            }
        })
            .then(function (response) {
                // handle success
                // this.setState({ messages: response.data.message });
                this.setState({ messages: response.data.message })

            }.bind(this))
            .catch(function (error) {
                // handle error
                alert(error);
            })
            .finally(function () {
                // always executed
            });
    }

    handleChange(event) {
        this.setState({ value: event.target.value });
        let send_button = document.getElementById('send-button');

        let btn2 = document.getElementById('btn2');

        if (event.target.value == '' && btn2.value == '') {
            send_button.disabled = "disabled";
            send_button.style.backgroundColor = "gray";

        } else if (event.target.value != '' || btn2.value != '') {

            send_button.disabled = "";
            send_button.style.backgroundColor = "#00AC97";
        }
    }

    filehandleChange(event) {
        let send_button = document.getElementById('send-button');
        let btn2 = document.getElementById('btn2');
        let review = document.getElementById('review');
        let reviewurl;

        if (event.target.value == '' && btn2.value == '') {

            send_button.disabled = "disabled";
            send_button.style.backgroundColor = "gray";

        } else if (event.target.value != '' || btn2.value != '') {

            if (btn2.value != '') {

                let reader = new FileReader();
                let str = '';

                reader.readAsDataURL(btn2.files[0]);

                reader.onload = function () {
                    reviewurl = reader.result;

                    str += '<table border="1"><tr><td><img src=' + reviewurl + '></td></tr>';
                    str += '<tr><td><input type="button" id="resetfile" value="削除" onclick="func2()"></td></tr></table>';
                    review.innerHTML += str;
                }
            }
            send_button.disabled = "";
            send_button.style.backgroundColor = "#00AC97";
        }
    }

    sendClick(){
        let database = firebase.database();

        let room = this.state.talk_id;
        const uname = authuser_name;
        const uicon = authuser_icon;
        const uid = authuser_id;
        let send_button = document.getElementById('send-button');
        let btn2 = document.getElementById('btn2');

        const sendarea = document.getElementById("sendarea");

        let now = new Date();

        if (btn2.files.length <= 0) {
            database.ref(authcompanyid + '/' + room).push({
                uid: uid,
                icon: uicon,
                name: uname,
                message: sendarea.value,
                isfile: 'nothing',
                date: now.getFullYear() + '年' + eval(now.getMonth() + 1) + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分'
            });
        } else {

            let file = 'images/' + now + btn2.files[0].name;

            let storageRef = firebase.storage().ref();
            let uploadTask = storageRef.child(file).put(btn2.files[0]);

            let fmessage = sendarea.value;

            uploadTask.on('state_changed',
                function (snapshot) {
                    // Observe state change events such as progress, pause, and resume
                    // See below for more detail
                }, function (error) {
                    // Handle unsuccessful uploads
                }, function () {
                    // Handle successful uploads on complete
                    // For instance, get the download URL: https://firebasestorage.googleapis.com/...

                    database.ref(room).push({
                        uid: uid,
                        icon: uicon,
                        name: uname,
                        message: fmessage,
                        isfile: file,
                        date: now.getFullYear() + '年' + eval(now.getMonth() + 1) + '月' + now.getDate() + '日' + now.getHours() + '時' + now.getMinutes() + '分'
                    });

                    let tu = document.getElementById('review');
                    tu.innerHTML = '';

                }
            );
        }

        sendarea.value = "";
        send_button.disabled = "disabled";
        send_button.style.backgroundColor = "gray";
        btn2.value = '';

    }
    componentDidMount() {

        const auth_id = auth_company_id;
        axios.get('http://localhost:8000/api/user', {
            params: {
                // ここにクエリパラメータを指定する
                companyid: auth_id,
                authuserid: authuser_id
            }
        })
            .then(function (response) {
                // handle success
                this.setState({ users: response.data.users });
                this.setState({ managements: response.data.management })
                this.setState({ talkname: this.state.managements[0]['talk_name']});
                this.setState({ talk_id: this.state.managements[0]['id']});

                for (var item in this.state.managements) {

                    console.log(item + ': ' + this.state.managements[0]['talk_name'])
                }
                // console.log(auth_id);

            }.bind(this))
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
            });


            let database = firebase.database();
            let room = this.state.talk_id;
            const userid = authuser_id;
            const output = document.getElementById("output");
            let storage = firebase.storage();
            let pathReference = storage.ref();
    
            let prevTask = Promise.resolve();

            //受信処理
            database.ref(companyid + '/' + room).on("child_added", (data) => {
                prevTask = prevTask.finally(async () => {
                    const v = data.val();
                    const k = data.key;
    
                    if ((v.message != "" && v.isfile != "nothing") || (v.message != "" && v.isfile == "nothing")) {
    
                        let str = "";
    
                        if (v.uid != userid) {
                            str += '<div class="faceicon">';
                            str += '<div class="faceicon">';
                            str += '<img src="' + v.icon + '" width="50" height="50" class="rounded-circle align-middle img-responsive float-left">';
                            str += '<div class="flex-col">';
                            str += ' <div class="flex-row">';
                            str += '<p class="name font-weight-bold m-0">' + v.name + '</p>';
                            str += '<p class="dateTime float-right">' + v.date + '</p></div>';
                            str += '<div class="message_box m-2">';
                            str += '<div class="message_content p-3">';
                            str += '<div class="message_text">' + v.message + '</div>';
                            str += '</div></div></div>';
                            str += '<div class="clear"></div></div>';

                            output.innerHTML += str;
                            output.scrollIntoView(false);
                            //編集おｋ
    
                        } else if (v.uid == userid) {
                            str += '<div class="my-faceicon">';
                            str += '<div class="faceicon">';
                            str += '<img src="' + v.icon + '" width="50" height="50" class="rounded-circle align-middle img-responsive float-left">';
                            str += '<div class="flex-col"><div class="flex-row">';
                            str += '<p class="name font-weight-bold m-0">' + v.name + '</p>';
                            str += '<p class="dateTime float-right">' + v.date + '</p></div>';
                            str += '<div class="message_box m-2">';
                            str += '<div class="message_content p-3">';
                            str += '<div class="message_text">' + v.message + '</div>';
                            str += '</div></div></div>';
                            str += '<div class="clear"></div></div>';

                            output.innerHTML += str;
                            output.scrollIntoView(false);

                            //編集ok

                        }
                    }
    
                    if ((v.isfile != "nothing" && v.message == "") || (v.isfile != "nothing" && v.message != "")) {
    
                        let str = "";
    
                        await pathReference.child(v.isfile).getDownloadURL().then(function (url) {
    
    
                            if (v.uid != userid) {
                                str += '<div className="faceicon">';
                                str += '<img src="..' + v.icon + '" width="50" height="50" class="rounded-circle align-middle img-responsive float-left">';
                                str += '<div className="flex-col">';
                                str += '<<div className="flex-row">';p
                                str += '<div class="message_text"><a href=' + url + '><img src=' + url + ' target="_blank" rel="noopener noreferrer"></a></div></div></div>';
                                str += '<p class="dateTime float-right">' + v.date + '</div>';
                                str += '<div class="clear"></div>';
                                output.innerHTML += str;
                                output.scrollIntoView(false);

                                                                
    
                            } else if (v.uid == userid) {
                                // str += '<div className="name"><img src="..' + v.icon + '" width="50" height="50" className="rounded-circle float-left img-responsive">名前：' + v.name + '</div>';
                                str += '<div class="myself">';
                                str += '<div class="faceicon">';
                                str += '<img src="..' + v.icon + '" width="50" height="50" class="rounded-circle align-middle img-responsive float-right"></div>';
                                str += '<div class="message_box m-2" style="background-color:lime;">';
                                str += '<div class="message_content p-3">';
                                str += '<div class="message_text"><a href=' + url + '><img src=' + url + ' target="_blank" rel="noopener noreferrer"></a></div></div></div>';
                                str += '<p class="dateTime float-left">' + v.date + '</div>';
                                str += '<div class="clear"></div>';
                                output.innerHTML += str;
                                output.scrollIntoView(false);
                            }
    
                        }).catch(function (error) {
    
                            // A full list of error codes is available at
                            // https://firebase.google.com/docs/storage/web/handle-errors
                            switch (error.code) {
                                case 'storage/object-not-found':
                                    alert('File doesn\'t exist');
                                    break;
    
                                case 'storage/unauthorized':
                                    alert('User doesn\'t have permission to access the object');
                                    break;
    
                                case 'storage/canceled':
                                    alert('User canceled the upload');
                                    break;
    
    
                                case 'storage/unknown':
                                    alert('Unknown error occurred, inspect the server response');
                                    break;
                            }
                        });
                    }
    
                });
            });
    }


    render() {


        const customStyles = {
            content: {
                top: '50%',
                left: '50%',
                right: 'auto',
                bottom: 'auto',
                marginRight: '-50%',
                transform: 'translate(-50%, -50%)'
            },
            overlay: {
                backgroundColor: 'rgba(0, 0, 0, 0.5)',
            }
        };
        return (

            <div className="main-menu">
                <div className="folder-menu">
                    <div className="search-back"><input type="text" className="search-text" placeholder=" &#xf002; キーワードを入力"></input></div>
                    <ul className="folder-list">

                        <li><button className="add" onClick={this.openModal}><i className="fas fa-user-plus"></i> トークを追加</button></li>

                        <Modal
                            isOpen={this.state.modalIsOpen}
                            onAfterOpen={this.afterOpenModal}
                            onRequestClose={this.closeModal}
                            style={customStyles}
                            contentLabel="Example Modal"
                            id="modal-add"
                        >

                            <h2 ref={subtitle => this.subtitle = subtitle}>トーク追加</h2>

                            <form id="modal-form">

                                <h3>トーク名を入力してください</h3><br></br>
                                <input type="text" name="modal-name" id="modal-name" onChange={this.modalNameChange}></input>
                                <p id="modal-name-invalid"></p>
                                <h3>トーク相手を選択してください</h3><br></br>
                                <div><label><input type="radio" name="talktype" value="private" onClick={this.radioClick} defaultChecked></input>個人</label></div>
                                <div>
                                    <select id="selectedprivate" >
                                        {this.state.users.map((user) => (
                                            <option key={user.id} name={user.name} id={user.id} value={user.id}>{user.name}</option>
                                        ))}
                                    </select>
                                </div>
                                <div><p className="modal-vali" id="modal-vali1"></p></div>

                                <div><label><input type="radio" name="talktype" value="room" onClick={this.radioClick}></input>ルーム</label></div><br></br>
                                <div>
                                    <select multiple="multiple" id="selectedroom">
                                        {this.state.users.map((user) => (
                                            <option key={user.id} name={user.name} id={user.id} value={user.id}>{user.name}</option>
                                        ))}
                                    </select>
                                </div>
                                <div><p className="modal-vali" id="modal-vali2"></p></div>
                                <button type="button" id="modal-form-button" onClick={this.modalClick}>追加する</button>
                            </form>

                            <div id="modal-button-area"><button onClick={this.closeModal}>close</button></div>

                        </Modal>

                        {this.state.managements.map((manage) => (
                            <li key={manage.id} name={manage.talk_name} id={manage.id}>

                                <div className="user-icon"><img src={manage.icon}></img></div>
                                <div className="user-text">
                                    <div className="text-list">
                                        <p className="person">{manage.talk_name}</p>
                                        <p className="date">{manage.updated_at}</p>
                                        <p className="talk-circle">7</p>
                                    </div>
                                    <div className="talk-list">
                                        <input type="button" id={manage.id} name={manage.talk_name} value={manage.message} onClick={this.messageClick}></input>
                                    </div>
                                </div>
                            </li>
                        ))}

                        {this.state.users.map((user) => (

                            <li key={user.id} name={user.name} id={user.id}>

                                <div className="user-icon"><i className="far fa-user"></i></div>
                                <div className="user-text">
                                    <div className="text-list">
                                        <p className="person">{user.name}</p>
                                        <p className="date">昨日</p>
                                        <p className="talk-circle">7</p>
                                    </div>
                                    <div className="talk-list">
                                        <input type="button" value="おはよう御座います。"></input>
                                    </div>
                                </div>
                            </li>
                        ))}
                        <li>
                            <div className="user-icon"><i className="far fa-user"></i></div>
                            <div className="user-text">
                                <div className="text-list">
                                    <p className="person">開発部長</p>
                                    <p className="date">昨日</p>
                                    <p className="talk-circle">7</p>
                                </div>
                                <div className="talk-list">
                                    <input type="text" value="おはよう御座います。こちらサンプルテキストです。"></input>
                                </div>
                            </div>
                        </li>




                    </ul>
                </div>
                <div className="main-contents">
                    <div className="my-header">
                        <div className="my-header-title">
                            <h5>トーク</h5>
                            <h6>{this.state.talkname}</h6>
                        </div>
                        <div className="my-header-items">
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-phone-alt"></i></a>
                                <p onClick={
                                    function () {

                                    }
                                }>通話</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-video"></i></a>
                                <p>ビデオ通話</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-bars"></i></a>
                                <p>メニュー</p>
                            </section>
                        </div>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i className="far fa-user"></i></a>
                            <p>アカウント</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i className="far fa-bell"></i></a>
                            <p>通知</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i className="fas fa-cog"></i></a>
                            <p>設定</p>
                        </section>
                        <section className="my-header-items-section">
                            <a href="" className="circle"><i className="far fa-question-circle"></i></a>
                            <p>ヘルプ</p>
                        </section>
                    </div>
                    <div className="main-item">
                        <div id="messageLine" className="p-2">

                            {/* <!-- 会話挿入空間 --> */}
                            <div className="opponent" id="output">
                                {/*相手*/}

                                {this.state.messages.map((message) => (
                                    <div className="faceicon" key={message.id}>

                                        <img src={message.icon} width="50" height="50" className="rounded-circle align-middle img-responsive float-left"></img>
                                        <div className="flex-col">
                                            <div className="flex-row">
                                                <p className="name font-weight-bold m-0">{message.name}</p>
                                                <p className="dateTime float-right">{message.updated_at}</p>
                                            </div>
                                            <div className="message_box m-2">
                                                <div className="message_content p-3">
                                                    <div className="message_text">{message.message}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="clear"></div>
                                    </div>
                                ))}
                                <div className="faceicon">
                                    <img src="" width="50" height="50" className="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">開発部長</p>
                                            <p className="dateTime float-right">2019</p>
                                        </div>
                                        <div className="message_box m-2">
                                            <div className="message_content p-3">
                                                <div className="message_text">おはよう御座います。</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="clear"></div>
                                </div>


                                {/*自分*/}
                                <div className="my-faceicon">
                                    <img src="" width="50" height="50" className="rounded-circle align-middle img-responsive float-left"></img>
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">自分</p>
                                            <p className="dateTime float-right">2019</p>
                                        </div>
                                        <div className="message_box m-2">
                                            <div className="message_content p-3">
                                                <div className="message_text">おはよう御座います。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。おはよう御座います。こちらサンプルテキストです。</div>
                                            </div>
                                        </div>

                                    </div>
                                    <div className="clear"></div>
                                </div>
                                
                                {/*相手*/}
                                <div className="faceicon">
                                    <img src="" width="50" height="50" className="rounded-circle align-middle img-responsive float-left"></img>
                                    {/* <p className="name font-weight-bold m-0">開発部長</p> */}
                                    <div className="flex-col">
                                        <div className="flex-row">
                                            <p className="name font-weight-bold m-0">開発部長</p>
                                            <p className="dateTime float-right">2019</p>
                                        </div>
                                        <div className="message_box m-2">
                                            <div className="message_content p-3">
                                                <div className="message_text">おはよう御座います。</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="clear"></div>
                                </div>
                            </div>
                        </div>

                        {/* </div> */}

                        {/* 会話部分ここまで↑ */}

                        {/* 会話送信部分ここから */}

                        <div id="review"></div>
                        <div id="send">
                            {/* ここにテキストエリアや送信ボタンを作る */}
                            <div id="send-text">
                                <textarea id="sendarea" value={this.state.value} onChange={this.handleChange}></textarea>
                                <div id="message-list">
                                    <button><i className="fas fa-wrench"></i></button>
                                    <button><i className="fas fa-paperclip"></i></button>
                                    <button><i className="fas fa-at"></i></button>
                                    
                                    <label htmlFor="btn2" id="avatar"><input id="btn2" type="file" onChange={this.filehandleChange} accept="image/*"></input><i className="fas fa-image"></i></label>
                                </div>
                            </div>

                            <button type="button" id="send-button" onClick={this.sendClick}><i className="fab fa-telegram-plane"></i></button>
                        </div>

                    </div>
                </div>
            </div>
        )
    }
}

// if (document.getElementById('talk')) {
//     ReactDOM.render(<Talk />, document.getElementById('talk'));
// }
