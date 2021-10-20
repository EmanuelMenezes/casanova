import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { FormularioClientesComponent } from "./formulario-clientes/formulario-clientes.component";
import { ListagemClientesComponent } from "./listagem-clientes/listagem-clientes.component";

const routes: Routes = [
  {
    path: "",
    redirectTo: "lista"
  },
  {
    path: "lista",
    component: ListagemClientesComponent
  },
  {
    path: "novo",
    component: FormularioClientesComponent
  },
  {
    path: ":id/editar",
    component: FormularioClientesComponent
  },
];


@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ClientesRoutingModule { }
