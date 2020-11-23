import React from 'react';
import ReactDOM from 'react-dom';

export default class Example extends React.Component {
    render() {
        return (

            <div>
                <div className="side">
                    {/*ドロワーメニュー*/}
                    <div className="drawer-menu">
                        <ul className="drawer-menu-inner">
                            <li><a href="" className="drawer-menu-a"><i class="fas fa-home"></i>ホーム</a></li>
                            <li><a href="" className="drawer-menu-a"><i class="fas fa-tasks"></i>タスク</a></li>
                            <li><a href="" className="drawer-menu-a"><i class="far fa-comment-alt"></i>トーク</a></li>
                            <li><a href="" className="drawer-menu-a"><i class="fas fa-book-open"></i>ノート</a></li>
                            <li><a href="" className="drawer-menu-a"><i class="far fa-folder"></i>ファイル共有</a></li>
                            <li><a href="" className="drawer-menu-a"><i class="far fa-file-alt"></i>レポート</a></li>
                        </ul>                
                    </div>
                </div>

                <div className="side">
                    {/*検索*/}
                    <div className="search-box">
                        <input type="text" className="search-text" placeholder="&#xf002;キーワードを入力"></input>
                    </div>
                    
                    <div className="folder">
                        {/* フォルダ追加
                        <div className="folder-add"><i class="fas fa-folder-plus"></i>追加</div> */}
                        {/*フォルダ一覧*/}
                        <ul className="folder-list">
                            <li><a href="" className="folder-a"><i class="far fa-folder"></i>テストフォルダ</a><a href=""><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="" className="folder-a"><i class="far fa-folder"></i>テストフォルダ</a><a href=""><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="" className="folder-a"><i class="far fa-folder"></i>テストフォルダ</a><a href=""><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="" className="folder-a"><i class="far fa-folder"></i>テストフォルダ</a><a href=""><i class="fas fa-ellipsis-h"></i></a></li>
                            <li><a href="" className="folder-a"><i class="far fa-folder"></i>テストフォルダ</a><a href=""><i class="fas fa-ellipsis-h"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div className="side">
                    {/*ファイル共有*/}
                    <div className="side">
                        <div className="file_sharing">
                            <h5>ファイル共有</h5>
                            <h6>フォルダ名</h6>
                        </div>
                    </div>
                    <div className="side">
                        <i class="fas fa-cloud-download-alt"></i>
                    </div>
                </div>
            </div>
        )
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
