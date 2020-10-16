import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { InstalacionesComponent } from './instalaciones/instalaciones.component';
import { SobrenosotrosComponent } from './sobrenosotros/sobrenosotros.component';
import { BodyComponent } from './body/body.component';


const APP_ROUTES: Routes = [
    { path: 'home', component: HomeComponent },
    { path: 'sobrenosotros', component: SobrenosotrosComponent },
    { path: 'instalaciones', component: InstalacionesComponent },
    { path: 'body', component: BodyComponent },
    { path: '**', pathMatch: 'full', redirectTo: 'home' },
];
export const APP_ROUTING = RouterModule.forRoot(APP_ROUTES);
