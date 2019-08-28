<?php

namespace app\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\MModul;

/**
 * app\modules\project\models\MModulSearch represents the model behind the search form about `app\modules\project\models\MModul`.
 */
 class MModulSearch extends MModul
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_project', 'kode'], 'integer'],
            [['name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MModul::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_project' => $this->id_project,
            'kode' => $this->kode,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
