using MetroSet_UI.Forms;
using System;
using System.Windows.Forms;

namespace painel_supermercado
{
    public partial class btn_cancelar : MetroSetForm
    {
        public btn_cancelar()
        {
            InitializeComponent();
        }
        ConexaoBD bd = new ConexaoBD(); //cria a conexao
        string sql;

        public void Limpar() //criacao do metodo de limpeza dos campos
        {
            txt_cpf.Clear();
            txt_email.Clear();
            txt_nome.Clear();
            txt_senha.Clear();
            txt_telefone.Clear();
        }

        private void btn_cadastrar_Click_1(object sender, EventArgs e) //executando o comando de cadastro no bd
        {
            sql = string.Format("insert into funcionario values(null, '{0}', '{1}', '{2}', '{3}', '{4}');"
    , txt_senha.Text, txt_email.Text, txt_nome.Text, txt_cpf.Text, txt_telefone.Text); //executa o comando na ordem dos elementos criados
            bd.AlterarTabelas(sql);                                                           //no bd
            MessageBox.Show("Funcionário cadastrado com sucesso!", "Funcionario cadastrado", MessageBoxButtons.OK, MessageBoxIcon.Information);
            Limpar();
        }

        private void btn_revelpsw_Click(object sender, EventArgs e)
        {
            txt_senha.UseSystemPasswordChar = false;
        }

        private void btncancelar_Click(object sender, EventArgs e)
        {
            this.Visible = false;
            frm_login cad = new frm_login();
            cad.ShowDialog();
        }
    }
}
