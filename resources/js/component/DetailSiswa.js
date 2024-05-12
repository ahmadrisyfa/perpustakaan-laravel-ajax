import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export class DetailSiswa extends Component {
    constructor(props) {
        super(props);
        this.state = {
            detail_siswa: [],
        };
    }

    loadData() {
        axios.get('/detail/siswa')
            .then((response) => this.setState({ detail_siswa: response.data.data }));
    }

    componentDidMount() {
        this.loadData()
    }

    render() {
        let rowNum = 1; // Inisialisasi nomor urut
        return (
            <div>
                <div className="col-12">
                    <div className="card recent-sales overflow-auto">
                        <div className="card-body">
                            <h5 className="card-title">Detail Data Anda</h5>
                            <table className="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No telepon</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {this.state.detail_siswa.map((item) => {
                                        return (
                                            <tr key={item.id}>
                                                <td>{item.user.name}</td>
                                                <td>{item.nama}</td>
                                                <td>{item.no_telepon}</td>
                                                <td>{item.alamat}</td>
                                                <td>{item.tanggal_lahir}</td>
                                                <td>{item.jenis_kelamin}</td>
                                                {/* <td>
                                                    {item.status == 1 ? (
                                                        <button className="btn btn-success btn-sm">Buku Sudah Di Kembalikan</button>
                                                    ) : (
                                                        <button className="btn btn-danger btn-sm">Buku Belum Di Kembalikan</button>
                                                    )}
                                                </td> */}
                                            </tr>
                                        );
                                    })}








                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        );
    }


}

if (document.getElementById('DetailListSiswa')) {
    ReactDOM.render(<DetailSiswa />, document.getElementById('DetailListSiswa'));
}
