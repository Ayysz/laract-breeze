import React from 'react'

const Form = ({error, handleChangeCode, handleChangePass, buttonClick, title, type}) => {
  return (
    <>
        <center>
            <b>Login {title}</b>
            <p>{error}</p>
        </center>
        <table>
            <tr>
                <td className="bar">{type}</td>
                <td className="bar">
                    <input type="text"
                        onChange={e => handleChangeCode(e)}
                    />
                </td>
            </tr>
            <tr>
                <td className="bar">Password</td>
                <td className="bar">
                    <input type="password"
                        onChange={e => handleChangePass(e)}
                    />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center>
                        <button className="button"
                            type='button'
                            onClick={() => buttonClick()}
                        >
                            Login
                        </button>
                    </center>
                </td>
            </tr>
        </table>
    </>
  )
}

export default Form