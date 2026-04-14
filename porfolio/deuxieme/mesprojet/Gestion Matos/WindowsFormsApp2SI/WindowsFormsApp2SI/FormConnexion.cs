using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApp2SI
{
    public partial class FormConnexion : Form
    {
        private string strcon = @"Server = .\SQLEXPRESS; Database=GM;Trusted_Connection=True;";
        public FormConnexion()
        {
            InitializeComponent();
        }

        private void buttonConnexion_Click(object sender, EventArgs e)
        {
            string login = textBoxLogin.Text;
            string pwd = textBoxPwd.Text;

            SqlConnection cn = new SqlConnection(strcon);
            cn.Open();
            string sql = "select count(*) as nb from Utilisateur where Login =  '" + login + "' and Pwd = '" + pwd + "'";

            SqlCommand com = new SqlCommand(sql, cn);
            SqlDataReader dr = com.ExecuteReader();
            dr.Read();

            int nb = Convert.ToInt32(dr["nb"]);

            if (nb > 0)
            {
                Close();   
            }
            else
            {
                MessageBox.Show("Identifiants Incorrects", "Erreur", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

            dr.Close();
            cn.Close();    

        }

        private void buttonAnnuler_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
