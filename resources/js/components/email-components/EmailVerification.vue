<template>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="top">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="top">
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                            <tr>
                                <td align="center" valign="top" style="background:#fff;">
                                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="table-inner">
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table-inner">
                                                    <tr>
                                                        <td width="150" align="center" valign="top" class="table-merge">
                                                            <table width="110" border="0" align="center" cellpadding="0" cellspacing="0" class="full">
                                                                <tr>
                                                                    <td align="center" valign="middle"><a href="#"><img editable="true" mc:edit="era-01" :src="logo" alt=""/></a></td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" class="table-inner">
                                                    <tr>
                                                        <td align="center" valign="top" style="font-family:'Open Sans', sans-serif, Verdana; font-size:18px; font-weight: bold; color:#020202;" mc:edit="era-02">
                                                            <multiline>Welcome to Klaudio Fashion</multiline>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" style="font-family:'Open Sans', sans-serif, Verdana; font-size:14px; color:#020202;" mc:edit="era-03">
                                                            <multiline>Please click on the link below to verify your email address. This is required to confirm ownership of the email address.</multiline>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table width="250" border="0" align="center" cellpadding="0"
                                                                cellspacing="0">
                                                                <tr>
                                                                    <td height="35" align="center" valign="middle" bgcolor="#D1191A" style="font-family:'Open Sans', sans-serif, Verdana; font-size:14px; color:#FFF; font-weight:600; line-height:0; -moz-border-radius: 22px; border-radius: 22px;" mc:edit="era-04">
                                                                        <multiline><a href="#" style="text-decoration:none; color:#FFF;">Verify your email address.</a></multiline>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</template>
<script>
import logo from "../../assets/logo-klaudio.png"
export default {
    data: function() {
        return{
            logo: logo,
        }
    }
}
</script>
<style scoped>

</style>