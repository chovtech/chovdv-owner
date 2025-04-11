const express = require("express");
const https = require("https");
const fs = require("fs");
const path = require("path");
const fileUpload = require("express-fileupload");
const socketIo = require("socket.io");

// Base64 encoded private key and certificate
const base64PrivateKey = `
-----BEGIN RSA PRIVATE KEY-----
MIIEpQIBAAKCAQEA0r9AkQOUXJ6UssHymZID8c+5iy++kqnNj3R8f/kunFyvQOB8
IKZDCLklrYDf7bes8quV50wtZ8eQ98/jOjey7Tab851WOCAIu/h7L/wJMNWF7JlT
VQSfh9P6DgntZcfXtQP8uWBIOAivAXfbv93WuBPwyXXLdzRALOHPsRZeadkUaoLQ
nRajVkn68O1zg1RniRJ/rzrOyvPFeTj7egPfjRFvoslzOD6j+ZOMOHJkBSuPCAce
625yB5TlFyPs6Q8LJsy2VfCpGXMK7lgUP42v2x9+9Rful7ywy6PtZ98/R+aWVx07
+7ExpViykCgEWr0IwL1v0kprm6ZSoUtITv8KGwIDAQABAoIBAQDDS7BNsf9+hQZP
USO75G/7WgAbV7dGukxfsBbfkM7833cYq+7bYrekEc80pcTdyeRfTVqw6Qr6rRlO
TDvJ62vIH18NtrP7dtQhPPcLVIg/1N8yjjOHCa28dVe4QsLYGwVuHa/JKcxDAOkM
d0IQ30bndrMgPiS65pTCAtAwzwXXFz9gdJH3mfKpUeH7mCguSNGA4L1OePDVPbmA
KBRelPcwhA/ZNYME3ndDI3uoHLBOb0yNPfVSMLsRff+9mla7eUML2nge/EcA9L3M
O/G+A8NY8W5xazJt6C83bUfus4l8h6T7IQ16GkR/Ty9Nr1SvEh+7zIpTQ1/3k9ai
jcv3HBChAoGBAP6ccy9cFdevMuorV8UDbR7E4h7H5g47QTQwqgHiCL88c40M/S1U
aiAQoqkjz9Es4i+u7j1XgHPTeo1o00QEzxDSDbTVNDiWc/i+KSZI2ammtObZ1Hbb
X4JQBqePcJQG4a5xEg5o+MdW+/Kbg9lzgSLQDiA8E4efhc/MfWBDdYBPAoGBANPl
jHD/QzfaQsWmZlZF1ICEtwENaRblqSoWHuXfOtHJg1PaC55iFCoz7Uz8a9dWecjY
RNOvDOCAgyUiKHHmfhDv1/5x5ZJlpHt7FtgAoMNmDUEkesW2jYRocPtWQERM+ASI
oBdr37C6SmkzypVwA9/PwRLJdu6HAvYZfnsNTrp1AoGBALrzM1xt+BfTq8Xnp12g
w2nZVNMXImQGvDzPErWpO5T3lTzXcbrsBbSfomAhTIGhvD8Y6hOegVIK0Syt8Jo8
EbKfGbNS7TIzvtnA/0P+L9xy7Neo0GmpcHqlug0ktJvsZZ+JpKFyEGGGDB86c1ii
iAqAzC59DjYCOuW2l8SsI8XfAoGBAJxg9iqWWBcqHskbKr9UvaUzTJOcQAhD6XpD
5P2kpxYX77G8Y4K5w0P6GpEMYNIE4c/Vu8W1lH1CmoaXFN4qSrNZLkB78f7+wErY
5lz26a4K7JE8yNaNCRfEtEzotHkzjH5cDjn6xJT6htvo+wMaLeHIwyaIRBt4zDiv
S+aoRYfZAoGAE3kJz2SFF+W3Fed31cqcsBTHaP0O3sGeN6bpp7gdXIY551lMGITa
KUaRJUoiNQmY1qbzm7NlNaTFD0+jPKzotxaxybeKtW3LR7mZVLID1fSRei2Lurrk
B2nQR1IDNZFvfHmXuPEgPd/z5stnNcdtP2MkJ+peNmqR7ExdIalkEJ8=
-----END RSA PRIVATE KEY-----
`;

const base64Certificate = `
-----BEGIN CERTIFICATE-----
MIIF/zCCBOegAwIBAgIQW/tps27shGJJFvO0qFAwSzANBgkqhkiG9w0BAQsFADBy
MQswCQYDVQQGEwJVUzELMAkGA1UECBMCVFgxEDAOBgNVBAcTB0hvdXN0b24xFTAT
BgNVBAoTDGNQYW5lbCwgSW5jLjEtMCsGA1UEAxMkY1BhbmVsLCBJbmMuIENlcnRp
ZmljYXRpb24gQXV0aG9yaXR5MB4XDTI0MDUwNzAwMDAwMFoXDTI0MDgwNTIzNTk1
OVowITEfMB0GA1UEAxMWZWR1bWVzcy12Mi5lZHVtZXNzLmNvbTCCASIwDQYJKoZI
hvcNAQEBBQADggEPADCCAQoCggEBANK/QJEDlFyelLLB8pmSA/HPuYsvvpKpzY90
fH/5Lpxcr0DgfCCmQwi5Ja2A3+23rPKrledMLWfHkPfP4zo3su02m/OdVjggCLv4
ey/8CTDVheyZU1UEn4fT+g4J7WXH17UD/LlgSDgIrwF327/d1rgT8Ml1y3c0QCzh
z7EWXmnZFGqC0J0Wo1ZJ+vDtc4NUZ4kSf686zsrzxXk4+3oD340Rb6LJczg+o/mT
jDhyZAUrjwgHHutucgeU5Rcj7OkPCybMtlXwqRlzCu5YFD+Nr9sffvUX7pe8sMuj
7WffP0fmllcdO/uxMaVYspAoBFq9CMC9b9JKa5umUqFLSE7/ChsCAwEAAaOCAuAw
ggLcMB8GA1UdIwQYMBaAFH4DWmVBa6d+CuG4nQjqHY4dasdlMB0GA1UdDgQWBBRo
x7nSv0LZsk/fAtt3E1t1yseR9zAOBgNVHQ8BAf8EBAMCBaAwDAYDVR0TAQH/BAIw
ADAdBgNVHSUEFjAUBggrBgEFBQcDAQYIKwYBBQUHAwIwSQYDVR0gBEIwQDA0Bgsr
BgEEAbIxAQICNDAlMCMGCCsGAQUFBwIBFhdodHRwczovL3NlY3RpZ28uY29tL0NQ
UzAIBgZngQwBAgEwTAYDVR0fBEUwQzBBoD+gPYY7aHR0cDovL2NybC5jb21vZG9j
YS5jb20vY1BhbmVsSW5jQ2VydGlmaWNhdGlvbkF1dGhvcml0eS5jcmwwfQYIKwYB
BQUHAQEEcTBvMEcGCCsGAQUFBzAChjtodHRwOi8vY3J0LmNvbW9kb2NhLmNvbS9j
UGFuZWxJbmNDZXJ0aWZpY2F0aW9uQXV0aG9yaXR5LmNydDAkBggrBgEFBQcwAYYY
aHR0cDovL29jc3AuY29tb2RvY2EuY29tMIIBBAYKKwYBBAHWeQIEAgSB9QSB8gDw
AHYAdv+IPwq2+5VRwmHM9Ye6NLSkzbsp3GhCCp/mZ0xaOnQAAAGPURnaxwAABAMA
RzBFAiEA3Lq9pIFih2l9Pw6Pkiug9kqW2O7At6LQlOd4cV9h9XECIFnTt2cnvm2+
ffzNwcXvYHuty0yz1eBrY81X4sNZ4cuaAHYAPxdLT9ciR1iUHWUchL4NEu2QN38f
hWrrwb8ohez4ZG4AAAGPURnaiwAABAMARzBFAiBXdS+sf81WhK8Xfmsr1mqx9o0B
9Z4I0Yk8ivVYZ6hvqAIhAM3QgvEhVLmMz8y6Q6W+0dsruThVu+y1MaHtXGkHxc9L
MD0GA1UdEQQ2MDSCFmVkdW1lc3MtdjIuZWR1bWVzcy5jb22CGnd3dy5lZHVtZXNz
LXYyLmVkdW1lc3MuY29tMA0GCSqGSIb3DQEBCwUAA4IBAQAuwYaLCzHAW09Bhb22
PC1+cKKm0gRYFNjC+EbKRRSEwzM8x0zMXbCZM5fet921d8A5Ks10HUepCQe4Gxvj
aVX/95JW9Mh9+UApBBBpjhtnAMorqncWLz3S+tQ6AZhLQLdIU7dtWwz1/aolfIvx
NM6a84LZ+X9d0uGleXsdxUOxCsPO259x1P30r/tlZJpNtJbCDdI/Gsoz102WSVEq
mNvhOCvBS8CTN4ptvFXxIj2lObtfcdmj2A80agByTgDYgh/u/xQv0Je9uE0JJrTm
MB3maeNtALo2QJABSANHpRYIxqbpShBWXBCrLEsB2dIiwwNf+hTZbVkZXop3O9lZ
Trjz
-----END CERTIFICATE-----
`;



// Decode the Base64 encoded strings
const privateKey = Buffer.from(base64PrivateKey, 'base64').toString('utf8');
const certificate = Buffer.from(base64Certificate, 'base64').toString('utf8');

const sslOptions = {
  key: privateKey,
  cert: certificate,
};

const app = express();

// Middleware for serving static files
app.use(express.static(path.join(__dirname, "")));

// Middleware for file uploads
app.use(fileUpload());

// Create an HTTPS server
const httpsServer = https.createServer(sslOptions, app);

// Redirect HTTP to HTTPS
const httpApp = express();
httpApp.use((req, res, next) => {
  res.redirect(`https://${req.headers.host}${req.url}`);
});
const httpServer = http.createServer(httpApp);

// Setup Socket.IO with the server
const io = socketIo(httpsServer, {
  allowEIO3: true, // false by default
});


// Array to store user connections and host info
let userConnections = [];
let hostInfo = [];

// Socket.IO connection handling
io.on("connection", (socket) => {
  console.log("Socket connected: ", socket.id);

  socket.on("askToConnect", (data) => {
    const isMeetingExist = userConnections.find((info) => info.meeting_id === data.meetingid);
    if (isMeetingExist) {
      const isHostForMeeting = hostInfo.find((info) => info.meeting_id === data.meetingid);
      if (isHostForMeeting) {
        socket.to(isHostForMeeting.connectionId).emit("request_join_permission", {
          displayNames: data.displayName,
          meetingids: data.meetingid,
          connectionIds: socket.id,
        });
      }
    } else {
      hostInfo.push({
        connectionId: socket.id,
        user_id: data.displayName,
        meeting_id: data.meetingid,
        host: true,
      });
      const datt = {
        displayNames: data.displayName,
        meetingids: data.meetingid,
        connectionIds: socket.id,
        host: true,
      };
      userConnect(datt);
    }
  });

  socket.on("grant_join_permission", (dat) => {
    if (dat.permissionGranted) {
      userConnect(dat.data);
    } else {
      socket.to(dat.data.connectionId).emit("permission_denied");
      socket.disconnect();
    }
  });

  socket.on("SDPProcess", (data) => {
    socket.to(data.to_connid).emit("SDPProcess", {
      message: data.message,
      from_connid: socket.id,
    });
  });

  socket.on("sendMessage", (msg) => {
    const mUser = userConnections.find((p) => p.connectionId === socket.id);
    if (mUser) {
      const meetingid = mUser.meeting_id;
      const from = mUser.user_id;
      const list = userConnections.filter((p) => p.meeting_id === meetingid);
      list.forEach((v) => {
        socket.to(v.connectionId).emit("showChatMessage", {
          from: from,
          message: msg,
        });
      });
    }
  });

  socket.on("fileTransferToOther", (msg) => {
    const mUser = userConnections.find((p) => p.connectionId === socket.id);
    if (mUser) {
      const meetingid = mUser.meeting_id;
      const from = mUser.user_id;
      const list = userConnections.filter((p) => p.meeting_id === meetingid);
      list.forEach((v) => {
        socket.to(v.connectionId).emit("showFileMessage", {
          username: msg.username,
          meetingid: msg.meetingid,
          filePath: msg.filePath,
          fileName: msg.fileName,
        });
      });
    }
  });

  socket.on("disconnect", () => {
    const disUser = userConnections.find((p) => p.connectionId === socket.id);
    if (disUser) {
      const meetingid = disUser.meeting_id;
      userConnections = userConnections.filter((p) => p.connectionId !== socket.id);
      const list = userConnections.filter((p) => p.meeting_id === meetingid);
      list.forEach((v) => {
        socket.to(v.connectionId).emit("inform_other_about_disconnected_user", {
          connId: socket.id,
        });
      });
    }
  });

  socket.on("sendHandRaise", (data) => {
    const senderID = userConnections.find((p) => p.connectionId === socket.id);
    if (senderID) {
      const meetingid = senderID.meeting_id;
      const list = userConnections.filter((p) => p.meeting_id === meetingid);
      list.forEach((v) => {
        socket.to(v.connectionId).emit("HandRaise_info_for_others", {
          connId: socket.id,
          handRaise: data,
        });
      });
    }
  });
});

async function userConnect(data) {
  const existingUser = userConnections.find(
    (p) =>
      p.meeting_id === data.meetingids &&
      p.connectionId === data.connectionIds
  );

  if (!existingUser) {
    userConnections.push({
      connectionId: data.connectionIds,
      user_id: data.displayNames,
      meeting_id: data.meetingids,
    });

    const other_users = userConnections.filter(
      (p) =>
        p.meeting_id === data.meetingids &&
        p.connectionId !== data.connectionIds
    );

    const userCount = userConnections.length;

    socket.to(data.connectionIds).emit("inform_me_about_other_user", other_users);

    other_users.forEach((v) => {
      try {
        io.to(v.connectionId).emit("inform_others_about_me", {
          other_user_id: data.displayNames,
          connId: data.connectionIds,
          userNumber: userCount,
        });
      } catch (error) {
        console.error("Error in emit:", error);
      }
    });
  }
}

app.post("/attachimg", (req, res) => {
  const data = req.body;
  const imageFile = req.files.zipfile;
  const dir = path.join(__dirname, "public/attachment/", data.meeting_id);

  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir);
  }

  imageFile.mv(path.join(dir, imageFile.name), (error) => {
    if (error) {
      console.error("Could not upload the image file, error: ", error);
      res.status(500).send("Could not upload the image file.");
    } else {
      res.send("Image file successfully uploaded.");
    }
  });
});


const HTTPS_PORT = 443;
httpsServer.listen(HTTPS_PORT, () => {
  console.log(`Secure server is running on port ${HTTPS_PORT}`);
});

const HTTP_PORT = 80;
httpServer.listen(HTTP_PORT, () => {
  console.log(`HTTP server is running on port ${HTTP_PORT} and redirecting to HTTPS`);
});
