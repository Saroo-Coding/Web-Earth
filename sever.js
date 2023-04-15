const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const io = require("socket.io")(server, {
    cors: { origin: '*' }
});
const port = 3000;

io.on('connection', (socket) => {
    console.log('Connection');

    //user-id online
    socket.on('send_online', userId => {//nhan id tu client
        socket.broadcast.emit('get_online', userId);//gui cho tat ra tru minh
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