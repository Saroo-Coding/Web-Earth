const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: '*' }
});
const port = 3000;

const user = [];
io.on('connection', (socket) => {
    console.log('Connection');

    //user-id online
    socket.on('send_online', userId => {//nhan id tu client
        // luu danh sach id len sever nen load lai no van nam day nhung dis ko xoa id day nen la dis ton tai vinh vien
        // user.push({'userId': userId});
        // const result = user.filter((thing, index, self) => index === self.findIndex((t) => t.userId === thing.userId));
        // console.log(result);
        // io.emit('get_online', result);//gui cho tat ca
        socket.broadcast.emit('get_online', userId);//gui cho tat ca tru minh
    });

    //cmt
    socket.on('send_Cmt', cmt => {
        io.emit('get_Cmt', cmt);
    });
    
    // socket.on("connect", () => {
    //     console.log('Reconnect');
    // });

    socket.on('disconnect', () => {
        console.log('Disconnect');
    });
});

server.listen(port, () => {
    console.log(`Socket.IO server running at http://localhost:${port}/`);
});