// ================================================================================
// Switter API
// @package   Switter
// ================================================================================

/**
 * REST APIの返り値をパック
 *
 * @param {*} path
 * @param {*} params
 * @param {*} response
 * @returns
 */
 const pack = (path, params, response) => {
    let success = false
    const errors = []
    if (response && response.status === 200 && response.data.success) {
        success = true
    } else if (
        response &&
        response.data.errors &&
        Object.keys(response.data.errors).length > 0
    ) {
        for (const i in response.data.errors) {
            errors.push(response.data.errors[i])
        }
    }
    if (response.data.result) {
        result = { success, result: response.data.result, errors }
    } else {
        result = { success, result: '', errors }
    }

    // // デバッグ時のみ
    // if (process.env.NODE_ENV !== 'production') {
    //     console.log({ path, params, ...result })
    // }

    return result
}
/**
 * REST API のGETメソッドコール
 * @param {*} path
 * @param {*} params
 */
const get = async (path, params) => {
    // path = path.startsWith('/api') ? process.env.apiUrl + path.substr(1) : path
    // path = process.env.apiUrl + path
    const response = await axios
        .get(path, JSON.stringify(params))
        .catch((error) => {
            console.log(error)
        })
    return pack(path, params, response)
}
/**
 * REST API のPOSTメソッドコール
 * @param {*} path
 * @param {*} params
 */
const post = async (path, params) => {
    // path = path.startsWith('/api') ? process.env.apiUrl + path.substr(1) : path
    // path = process.env.apiUrl + path
    const response = await axios
        .post(path, JSON.stringify(params), {
            headers: { 'Content-Type': 'application/json' },
            timeout: 15000
        })
        .catch((error) => {
            console.log(error)
        })

    return pack(path, params, response)
}
/**
 * REST API のPUTメソッドコール
 * @param {*} path
 * @param {*} params
 */
const put = async (path, params) => {
    // path = path.startsWith('/api') ? process.env.apiUrl + path.substr(1) : path
    // path = process.env.apiUrl + path
    const response = await axios
        .put(path, JSON.stringify(params), {
            headers: { 'Content-Type': 'application/json' },
            timeout: 15000
        })
        .catch((error) => {
            console.log(error)
        })

    return pack(path, params, response)
}
/**
 * REST API のDELETEメソッドコール
 * @param {*} path
 * @param {*} params
 */
const deleteApi = async (path, params) => {
    // path = path.startsWith('/api') ? process.env.apiUrl + path.substr(1) : path
    // path = process.env.apiUrl + path
    const response = await axios
        .delete(
            path,
            { data: JSON.stringify(params) },
            {
                headers: {
                    'Content-Type': 'application/json'
                },
                timeout: 15000
            }
        )
        .catch((error) => {
            console.log(error)
        })

    return pack(path, params, response)
}

// ----------------------------------------------------------------------
// API 一覧
// ----------------------------------------------------------------------

/**
 * ホーム画面表示用の投稿情報を取得
 */
async function getAllPosts() {
    return await get('/api/home');
}