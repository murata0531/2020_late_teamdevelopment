// import React from 'react';
// import ReactDOM from 'react-dom';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';
import axios from 'axios';

Modal.setAppElement("#app");

const authuser_id = auth_user_id;

export default class Talk extends Component {



    constructor(props) {

        super(props);

        this.state = {
            users: [],
            modalIsOpen: false,

        };


        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
        this.radioClick = this.radioClick.bind(this);
        // this.modalClick = this.modalClick.bind(this);

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

    // modalClick() {
    //     const check = document.getElementById('modal-form').talktype;
    //     const selectedprivate = document.getElementById('selectedprivate');
    //     const selectedroom = document.getElementById('selectedroom');
    //     const modal_vali1 = document.getElementById('modal-vali1');
    //     const modal_vali2 = document.getElementById('modal-vali2');

    //     if (check.value == 'private') {
    //         if (selectedprivate == "" || selectedprivate == 'undifined') {
    //             modal_vali1.textContent = "追加したいメンバーを選んでください";

    //         } else {
    //         }
    //     } else {
    //         if (selectedroom.length <= 0 || selectedroom == 'undifined') {
    //             modal_vali2.textContent = "追加したいメンバーを選んでください";
    //         } else {

    //             const array = [];

    //             for (let i = 0; i < selectedroom.length; i++) {
    //                 if (selectedroom[i].selected) {
    //                     array.push(selectedroom[i].value)
    //                 }
    //             }
    //             alert(authuser_id);

    //             axios
    //                 .post('/api/add/', array,authuser_id)
    //                 .then(res => {
    //                     alert("登録完了");
    //                 })
    //                 .catch(error => {
    //                     alert("登録失敗");
    //                     console.log(error, data);
    //                 });
    //             modal_vali2.textContent = "";

    //         }
    //     }

    // }
    componentDidMount() {

        const auth_id = auth_company_id;
        axios.get('http://localhost:8000/api/user', {
            params: {
                // ここにクエリパラメータを指定する
                companyid: auth_id
            }
        })
            .then(function (response) {
                // handle success
                this.setState({ users: response.data.users });
                console.log(this.state.users);
                console.log(auth_id);

            }.bind(this))
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
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

                            <h2 ref={subtitle => this.subtitle = subtitle}>トーク相手を選択してください</h2>

                            <form id="modal-form" method="post" action="api/add">

                                <input type="hidden" name="_token" value={document.querySelector('meta[name="csrf-token"').getAttribute('content')} />

                                <div><label><input type="radio" name="talktype" value="private" onClick={this.radioClick} defaultChecked></input>個人</label></div>
                                <div>
                                    <select id="selectedprivate" >
                                        {this.state.users.map((user) => (
                                            <option key={user.id} name={user.name} id={user.id} value={user.id}>{user.name}</option>
                                        ))}
                                    </select>
                                </div>
                                <div><p class="modal-vali" id="modal-vali1"></p></div>

                                <div><label><input type="radio" name="talktype" value="room" onClick={this.radioClick}></input>ルーム</label></div>
                                <div>
                                    <select multiple="multiple" id="selectedroom">
                                        {this.state.users.map((user) => (
                                            <option key={user.id} name={user.name} id={user.id} value={user.id}>{user.name}</option>
                                        ))}
                                    </select>
                                </div>
                                <div><p class="modal-vali" id="modal-vali2"></p></div>
                                <button type="submit">追加する</button>
                            </form>

                            <button onClick={this.closeModal}>close</button>

                        </Modal>

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
                            <h6>グループ名</h6>
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
                            <div className="opponent">
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

                        <div id="send">
                            {/* ここにテキストエリアや送信ボタンを作る */}
                            <div id="send-text">
                                <textarea></textarea>
                                <div id="message-list">
                                    <i className="fas fa-wrench"></i>
                                    <i className="fas fa-paperclip"></i>
                                    <i className="fas fa-at"></i>
                                    <i className="fas fa-image"></i>
                                </div>
                            </div>

                            <button type="submit" id="send-button" onClick={this.getData}><i className="fab fa-telegram-plane"></i></button>
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
