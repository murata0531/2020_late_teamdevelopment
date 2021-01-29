import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Modal from 'react-modal';
import axios from 'axios';

Modal.setAppElement("#app");

const authuser_id = auth_user_id;
const authuser_name = auth_user_name;
const authuser_icon = auth_user_icon;
const authcompany_id = auth_company_id;

const database = firebase.database();
let storage = firebase.storage();
let storageRef = firebase.storage().ref();



export default class File_Sharing extends Component {

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


        this.openModal = this.openModal.bind(this);
        this.afterOpenModal = this.afterOpenModal.bind(this);
        this.closeModal = this.closeModal.bind(this);
        this.modalNameChange = this.modalNameChange.bind(this);
        this.radioClick = this.radioClick.bind(this);
        this.modalClick = this.modalClick.bind(this);

    }

    openModal() {
        this.setState({ modalIsOpen: true });
    }

    afterOpenModal() {
        // references are now sync'd and can be accessed.
        const selectedfile = document.getElementById('selectedfile');
        selectedfile.style.display = "none";
    }

    closeModal() {
        this.setState({ modalIsOpen: false });
    }

    modalNameChange(e) {

        this.setState({ modal_name: e.target.value });

    }

    radioClick() {

        const check = document.getElementById('modal-form').type;

        const selectedfolder = document.getElementById('selectedfolder');
        const selectedfile = document.getElementById('selectedfile');

        if (check.value == 'folder') {
            selectedfolder.style.display = "";
            selectedfile.style.display = "none";
        } else {
            selectedfolder.style.display = "none";
            selectedfile.style.display = "";
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
                        alert("トークが追加されました");
                    })
                    .catch(error => {
                        alert("登録失敗");
                        // console.log(error, data);
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
                        alert("トークが追加されました");
                    })
                    .catch(error => {
                        alert("登録失敗");
                    });
                modal_vali2.textContent = "";

            }
        }

    }

    modalNameChange(e) {

        this.setState({ modal_name: e.target.value });

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
                        <li><button className="add" onClick={this.openModal}><i class="far fa-plus-square"></i>追加</button></li>

                        <Modal
                            isOpen={this.state.modalIsOpen}
                            onAfterOpen={this.afterOpenModal}
                            onRequestClose={this.closeModal}
                            style={customStyles}
                            contentLabel="Example Modal"
                            id="modal-add"
                        >

                            {/* <h2 ref={subtitle => this.subtitle = subtitle}></h2> */}
                            
                                <form id="modal-form">

                                    <div><label><input type="radio" name="type" value="folder" onClick={this.radioClick} defaultChecked></input>フォルダ</label></div>
                                    <div><input type="text" name="modal-name" id="modal-name" id="selectedfolder" onChange={this.modalNameChange}></input></div>
                                    <div><p className="modal-vali" id="modal-vali1"></p></div>

                                    <div><label><input type="radio" name="type" value="file" onClick={this.radioClick}></input>ファイル</label></div><br></br>
                                    <div><input type="file" id="selectedfile"></input></div>
                                    <div><p className="modal-vali" id="modal-vali2"></p></div>
                                    <button type="button" id="modal-form-button" onClick={this.modalClick}>追加する</button>
                                </form>
                            
                            <div id="modal-button-area"><button onClick={this.closeModal}>close</button></div>

                        </Modal>

                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                        <li><a href="" className="folder-a"><i className="far fa-folder folder-icon"></i>テストフォルダ</a><a href=""><i className="fas fa-ellipsis-h"></i></a></li>
                    </ul>
                </div>
                <div className="main-contents">
                    <div className="my-header">
                        <div className="my-header-title">
                            <h5>ファイル共有</h5>
                            <h6>フォルダ名</h6>
                        </div>
                        <div className="my-header-items">
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-cloud-download-alt"></i></a>
                                <p onClick={
                                    function () {

                                    }
                                }>ダウンロード</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-cloud-upload-alt"></i></a>
                                <p>アップロード</p>
                            </section>
                            <section className="my-header-items-section">
                                <a href="" className="circle"><i className="fas fa-user-plus"></i></a>
                                <p>共有ユーザ追加</p>
                            </section>
                        </div>
                    </div>
                    <div className="account-settings">
                        <section className="my-header-items-section">
                            <a href="/home/account" className="circle"><i className="far fa-user"></i></a>
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
                        <table border="0">
                            <tr>
                                <th></th>
                                <th></th>
                                <th><a href="">ファイル名</a></th>
                                <th></th>
                                <th><a href="">ファイルサイズ</a></th>
                                <th><a href="">変更日</a></th>
                            </tr>

                            <tr>

                                <td><input type="checkbox"></input></td>
                                <td><i className="far fa-file"></i></td>
                                <td><a href="">サンプルファイル</a></td>
                                <td><a href=""><i className="fas fa-ellipsis-h"></i></a></td>
                                <td>3.9MB</td>
                                <td>3日前</td>

                            </tr>
                            <tr>

                                <td><input type="checkbox"></input></td>
                                <td><i className="far fa-file"></i></td>
                                <td><a href="">サンプルファイル</a></td>
                                <td><a href=""><i className="fas fa-ellipsis-h"></i></a></td>
                                <td>3.9MB</td>
                                <td>3日前</td>

                            </tr>
                            <tr>
                                {/* <a href=""> */}
                                <td><input type="checkbox"></input></td>
                                <td><i className="far fa-file"></i></td>
                                <td><a href="">サンプルファイル</a></td>
                                <td><a href=""><i className="fas fa-ellipsis-h"></i></a></td>
                                <td>3.9MB</td>
                                <td>3日前</td>
                                {/* </a> */}
                            </tr>
                        </table>

                    </div>
                </div>

            </div>
        );
    }
}

// file_sharing.blade.php内にfile_sharingというタグがある場合、 //
if (document.getElementById('file_sharing')) {
    // File_Sharingクラスを実行する //
    ReactDOM.render(<File_Sharing />, document.getElementById('file_sharing'));

}