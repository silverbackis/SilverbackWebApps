import config from '../nuxt.config.js'
config.dev = process.env.NODE_ENV !== 'production'

import express from 'express'
import bodyParser from 'body-parser'
import helmet from 'helmet'
import cookieParser from 'cookie-parser'
const compression = require('compression')

const mysql = require('mysql')
const session = require('express-session')

import BWServerBase from '@cwamodules/server'
import _omit from 'lodash/omit'

const logging = process.env.NODE_ENV === 'development'

/**
 * CREATE APP SERVER
 */
const app = express()
app.disable('x-powered-by')
app.set('trust proxy', !!config.dev)
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())
app.use(helmet())
app.use(cookieParser())
app.use(compression())

/**
 * SETUP SESSION STORE
 */
const MySQLStore = require('express-mysql-session')(session);
const mysqlOps = {
  host: 'mysql',
  port: 3306,
  user: process.env.MYSQL_USER,
  password: process.env.MYSQL_PASSWORD,
  database: process.env.MYSQL_DATABASE
}
const connection = mysql.createConnection(mysqlOps)
const sessionStore = new MySQLStore({}, connection)

/**
 * SETUP SESSION USING THE MYSQL STORE
 */
let sessOps = {
  name: 'JS_SESSION',
  key: 'JS_SESSION',
  secret: process.env.COOKIE_SECRET,
  resave: false,
  saveUninitialized: false,
  proxy: true,
  cookie: {
    secure: !config.dev,
    httpOnly: true,
    maxAge: null,
    path: '/'
  },
  store: sessionStore
}
app.use(session(sessOps))

/**
 * ADD SERVER ROUTES
 */
const router = express.Router()
router.use((req, res, next) => {
  Object.setPrototypeOf(req, app.request)
  Object.setPrototypeOf(res, app.response)
  req.res = res
  res.req = req
  next()
})

const authPostHeaders = { 'X-AUTH-TOKEN': process.env.VARNISH_TOKEN || '' }

const BWServer = new BWServerBase(process.env)
router.post('/login', (req, res) => {
  BWServer.login(req, res, authPostHeaders)
})
router.post('/register', (req, res) => {
  BWServer.post(
    req,
    res,
    _omit(req.body, '_action'),
    BWServer.loginSuccess,
    BWServer.loginError,
    authPostHeaders
  )
})

router.post('/logout', (req, res) => BWServer.logout(req, res))
router.post('/refresh_token', (req, res) =>
  BWServer.jwtRefresh(req, res, true, authPostHeaders)
)

app.use(router)

module.exports = {
  path: '',
  handler: app
}
